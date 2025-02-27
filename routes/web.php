<?php

use App\Models\faq;
use App\Models\news;
use App\Models\User;
use App\Models\trade;
use App\Models\amount;
use App\Models\package;
use App\Models\userData;
use App\Models\Withdrawal;
use App\Models\testimonial;
use App\Http\Controllers\welcome;
use App\Http\Controllers\LoginPanel;
use App\Livewire\Tabel;
use App\Models\notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    function getCurrency($amount)
    {
        $dataCurrency = Cache::get('data_currency', []);
        $currencyType = Auth::user()->userData->type_currency ? Auth::user()->userData->type_currency : "IDR";
        return round($amount * $dataCurrency['idr'][strtolower($currencyType)], 4);
    }

    Route::get('/', [welcome::class, 'Welcome']);

    Route::get('/profile', function () {
        $user = auth()->user();
        $userData = auth()->user()->userData;
        $members = auth()->user()->userMember->sum();
        return view('SettingProfile', [
            'route' => ['profile'],
            'title' => 'Settings',
            'user' => $user,
            'userData' => $userData,
            'members' => $members,
        ]);
    });

    Route::get('/profile-images', function () {
        return view('SettingFotoProfile', ['route' => ['profile-images'], 'title' => 'Settings']);
    });

    Route::get('/security', function () {
        return view('security', ['route' => ['security'], 'title' => 'Security']);
    });

    Route::get('/kyc', function () {
        $kycData = auth()->user()->KYCData;
        return view('kyc', [
            'route' => ['kyc'],
            'title' => 'KYC',
            'kycData' => $kycData,
            'kycStatus' => $kycData->status ?? null
        ]);
    });

    Route::get('/investment', function () {
        $investment = auth()->user()->userInvestment;
        $dataInvest = package::all();


        foreach ($dataInvest as $package) {
            $package->max_amount = getCurrency($package->max_amount);
            $package->min_amount = getCurrency($package->min_amount);
        }

        $transformedInvestment = $investment->map(function ($item) {
            return [
                "Date" => $item->updated_at,
                "Package" => $item->package,
                "Amount" => getCurrency($item->amount),
                "Status" => $item->status,
                "Invoice" => $item->invoice,
            ];
        });
        return view('investment', [
            'route' => ['investment'],
            'title' => 'Investment',
            'data' => $dataInvest,
            'header' => [
                "Date",
                "Package",
                "Amount",
                "Status",
                "Invoice",
            ],
            'filtered' => ['Date', 'Package', 'Status'],
            'colum' => $transformedInvestment
        ]);
    });

    Route::get('/trade', function () {
        $trade = trade::all();
        $transformedTrade = $trade->map(function ($item) {
            return [
                "Date" => $item->created_at,
                "Market" => $item->market,
                "Trx" => $item->trx,
                "Package" => $item->package->plan,
                "Amount" => getCurrency($item->amount),
                "Rate_Stake" => $item->rate_stake,
                "Rate_End" => $item->rate_end,
                "Status" => $item->status,
            ];
        });
        return view('trade', [
            'route' => ['trade'],
            'title' => 'Trade',
            'header' => [
                "Date",
                "Market",
                "Trx",
                "Package",
                "Amount",
                "Rate_Stake",
                "Rate_End",
                "Status",
            ],
            'filtered' => ['Market', 'Package', 'Status'],
            'colum' => $transformedTrade,
        ]);
    });

    Route::get('/trade/history', function () {
        $trade = trade::all();
        $transformedTrade = $trade->map(function ($item) {
            return [
                "Date" => $item->created_at,
                "No" => $item->id,
                "Package" => $item->package->plan,
                "Market" => $item->market,
                "Amount" => getCurrency($item->amount),
                "Date_End" => $item->updated_at,
                "Status" => $item->status,
                "Win_Lost" => $item->win_lost,
                "Rate_Trade" => $item->rate_stake,
                "Rate_End" => $item->rate_end,
            ];
        });
        return view('history', [
            'route' => ['trade', 'history'],
            'title' => 'Trade - History',
            'header' => [
                "Date",
                "No",
                "Package",
                "Market",
                "Amount",
                "Date_End",
                "Status",
                "Win_Lost",
                "Rate_Trade",
                "Rate_End",
            ],
            'filtered' => ['Market', 'Package', 'Status'],
            'colum' => $transformedTrade,
        ]);
    });

    Route::get('/trade/profits', function () {
        $profits = auth()->user()->userAmount->where("type", "profits")->where("status", "success");
        $totalProfits = auth()->user()->userAmount->where("type", "profits")->where("status", "success")->sum("amount");
        $transformedProfits = $profits->map(function ($item) {
            return [
                "Date" => $item->created_at->format('Y-m-d H:i:s'),
                "Type" => $item->type,
                "Amount" => getCurrency($item->amount),
                "Deposit_Code" => $item->id
            ];
        });
        return view('profits', [
            'route' => ['trade', 'profits'],
            'title' => 'Trade - Profits',
            'filtered' => ['Form'],
            'header' => [
                "Date",
                "Deposit_Code",
                "Type",
                "Amount"
            ],
            'colum' => $transformedProfits,
            'totalBonus' => $totalProfits
        ]);
    });

    Route::get('/bonus', function () {
        $bonus = auth()->user()->userAmount->where("type", "bonus")->where("status", "success");
        $totalBonus = auth()->user()->userAmount->where("type", "bonus")->where("status", "success")->sum("amount");
        $transformedBonus = $bonus->map(function ($item) {
            return [
                "Date" => $item->created_at->format('Y-m-d H:i:s'),
                "Form" => $item->userFrom->name,
                "Type" => $item->type,
                "Amount" => getCurrency($item->amount),
                "#" => $item->id
            ];
        });
        return view('bonus', [
            'route' => ['bonus'],
            'title' => 'Bonus',
            'header' => [
                "Date",
                "Form",
                "Type",
                "Amount",
                "#"
            ],
            'filtered' => ['Form'],
            'colum' => $transformedBonus,
            'totalBonus' => $totalBonus
        ]);
    });

    Route::get('/referals', function () {
        $referals = userData::where("referals", auth()->user()->userData->username)->get() ?? [];

        $transformedReferals = $referals->map(function ($item) {
            return [
                "Join_Date" => $item->created_at->format('Y-m-d H:i:s'),
                "User_ID" => $item->user_id,
                "Name" => $item->user->name,
                "Email_Address" => $item->user->email,
                "Phone" => $item->phone_number,
                "Status" => "success",
            ];
        });
        return view('referals', [
            'route' => ['referals'],
            'title' => 'Referals',
            'header' => [
                "Join_Date",
                "User_ID",
                "Name",
                "Email_Address",
                "Phone",
                "Status",
            ],
            'filtered' => ['Name'],
            'colum' => $transformedReferals,
            'totalReferals' => count($transformedReferals)
        ]);
    });

    Route::get('/balance', function () {
        $balance = auth()->user()->userAmount;
        $totalBalance = auth()->user()->userAmount->sum("amount");
        $transformedBalance = $balance->map(function ($item) {
            return [
                "No" => $item->id,
                "Date" => $item->created_at->format('Y-m-d H:i:s'),
                "Type" => $item->type,
                "Amount" => getCurrency($item->amount),
                "Note" => $item->noted,
                "Status" => $item->status,
            ];
        });
        return view('Balance', [
            'route' => ['balance'],
            'title' => 'Balance',
            'header' => [
                "No",
                "Date",
                "Type",
                "Amount",
                "Note",
                "Status",
            ],
            'filtered' => ['Date', 'Type', 'Status'],
            'colum' => $transformedBalance,
            'totalBalance' => $totalBalance
        ]);
    });

    Route::get('/balance/virtual-balance', function () {
        $balance = auth()->user()->userAmount;
        $totalBalance = auth()->user()->userAmount->sum("amount");
        $transformedBalance = $balance->map(function ($item) {
            return [
                "No" => $item->id,
                "Date" => $item->created_at->format('Y-m-d H:i:s'),
                "Type" => $item->type,
                "Amount" => $item->amount,
                "Note" => $item->noted,
                "Status" => $item->status,
            ];
        });
        return view('VirtualBalance', [
            'route' => ['balance', 'virtual-balance'],
            'title' => 'Virtual Balance',
            'header' => [
                "No",
                "Date",
                "Type",
                "Amount",
                "Note",
                "Status",
            ],
            'filtered' => ['Date', 'Type', 'Status'],
            'colum' => $transformedBalance,
            'totalBalance' => $totalBalance
        ]);
    });

    Route::get('/balance/add', function () {
        $amount = auth()->user()->userAmount->where("type", "deposit");
        $transformedAmount = $amount->map(function ($item) {
            return [
                "Date" => $item->updated_at,
                "Amount" => getCurrency($item->amount),
                "Pay" => $item->noted,
                "Status" => $item->status,
            ];
        });
        return view('AddBalance', [
            'route' => ['balance', 'add'],
            'title' => 'Add Balance',
            'header' => [
                "Date",
                "Amount",
                "Pay",
                "Status",
            ],
            'filtered' => ['Date', 'Amount', 'Pay', 'Status'],
            'colum' => $transformedAmount,
        ]);
    });

    Route::get('/balance/withdrawal', function () {
        $amount = Withdrawal::where("user_id", auth()->user()->id)->get();
        $transformedAmount = $amount->map(function ($item) {
            return [
                "Date" => $item->created_at,
                "Amount" => getCurrency($item->amount_withdraw),
                "Fee" => getCurrency($item->fee),
                "Received" => $item->updated_at,
                "News" => "Withdraw Balance",
                "Status" => $item->status,
            ];
        });
        return view('Withdrawal', [
            'route' => ['balance', 'withdrawal'],
            'title' => 'Withdrawal',
            'header' => [
                "Date",
                "Amount",
                "Fee",
                "Received",
                "News",
                "Status",
            ],
            'filtered' => ['Date', 'Amount', 'Received', 'Status'],
            'colum' => $transformedAmount,
        ]);
    });

    Route::get('/balance/transfer', function () {
        $amount = amount::where("from_user", auth()->user()->id)->where("type", "transfer")->get();

        $transformedAmount = $amount->map(function ($item) {
            return [
                "Date" => $item->updated_at,
                "To" => $item->user_id,
                "Amount" => getCurrency($item->amount),
                "News" => $item->noted,
                "Status" => $item->status,
            ];
        });
        return view('Transfer', [
            'route' => ['balance', 'transfer'],
            'title' => 'Transfer',
            'header' => [
                "Date",
                "To",
                "Amount",
                "News",
                "Status",
            ],
            'filtered' => ['Date', 'Amount', 'Pay', 'Status'],
            'colum' => $transformedAmount,
        ]);
    });

    Route::get('/auth/registrasion', function () {
        auth()->logout();
        return redirect()->to("/admin/register");
    });

    Route::get('/faq', function () {
        $faqs = faq::all();
        return view('faq', [
            'route' => ['faq'],
            'title' => 'FAQ',
            'data' => $faqs
        ]);
    });

    Route::get('/last-news', function () {
        $news = news::where('status', 'publish')->get();
        return view('LastNews', [
            'route' => ['last-news'],
            'title' => 'Last News',
            'data' => $news
        ]);
    });

    Route::get('/testimonials', function () {
        $testimonial = testimonial::where('status', 'publish')->get();
        return view('testimonials', [
            'route' => ['testimonials'],
            'title' => 'Testimonials',
            'data' => $testimonial
        ]);
    });

    Route::get('/testimonials/add', function () {
        $testimonial = testimonial::where('status', 'publish')->where("user_id", Auth::id())->get();
        $transformedTestimonial = $testimonial->map(function ($item) {
            return [
                "Date" => $item->created_at->format('Y-m-d H:i:s'),
                "Testimonial" => $item->testimonial,
                "Status" => $item->status,
            ];
        });
        return view('AddTestimonials', [
            'route' => ['testimonials', 'add'],
            'title' => 'Testimonials',
            'header' => [
                "Date",
                "Testimonial",
                "Status",
            ],
            'colum' => $transformedTestimonial,
            'filtered' => ['Date', 'Testimonial']
        ]);
    });

    Route::get('/notification', function () {
        $data = notification::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('user_id', 'All');
        })
            ->orderBy('created_at', 'desc')->get();

        foreach ($data as $d) {
            if ($d->status == "unread") {
                notification::where("id", $d->id)->update(["status" => "read"]);
            }
        }

        return view('notification', [
            'route' => ['notification'],
            'title' => 'Notification',
            'data' => $data
        ]);
    });

    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->to("/admin/login");
    });
});

Route::get('/register', function () {
    return view('RegisterPanel');
})->name('filament.admin.auth.login');

Route::get('/admin/register', function () {
    return redirect()->to("/register");
});

Route::get('/login', function () {
    return view('LoginPanel');
})->name('filament.admin.auth.login');

Route::get('/admin/login', function () {
    return redirect()->to("/login");
});
