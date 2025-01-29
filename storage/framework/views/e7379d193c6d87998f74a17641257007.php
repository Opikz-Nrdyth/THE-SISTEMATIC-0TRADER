<header
    class="flex lg:w-[80%] lg:absolute relative z-20 right-0 top-0 h-[70px] shadow-md justify-between px-3 items-center bg-primary text-white transition-all duration-200"
    id="header">
    <button class="text-2xl" id="bars">
        <i class="fa-solid fa-bars-staggered"></i>
    </button>
    <nav class="flex items-center sm:gap-1 lg:gap-4 relative">
        <button class="bg-base-card p-2 rounded">
            <p><span onclick="currency()">SGD</span>
                <?php echo e(auth()->user()->userAmount->isNotEmpty() ? auth()->user()->userAmount->where('status', 'success')->sum('amount') : 0); ?>

                <span class="bg-secondary px-2 py-1 rounded-md ml-3 font-bold">REAL</span>
            </p>
        </button>
        <div class="absolute top-11 left-0 bg-base-card" style="display: none" id="currency_option">
            <?php $__currentLoopData = \App\Models\Currency::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="hover:bg-primary flex justify-center gap-1 py-2 px-2">
                    <img src="<?php echo e(asset('storage/' . strtolower($currency->currency_logo))); ?>" width="25px"
                        alt="<?php echo e($currency->currency_code); ?>">
                    <p><?php echo e($currency->currency_name); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <a href="/notification">
            <button class="hover:bg-base-card w-[40px] h-[40px] rounded-md transition-all duration-200 relative">
                <?php if($notification): ?>
                    <div class="rounded-full w-[10px] h-[10px] bg-red-500 absolute right-1 top-1"></div>
                <?php endif; ?>
                <i class="fa-solid fa-bell"></i>
            </button>
        </a>
        <a href="/profile">
            <button class="bg-base-card w-[40px] h-[40px] rounded-full transition-all duration-200">
                <img class="w-full h-full rounded-full"
                    src="<?php if(auth()->user()->userData->profile_image ?? '' != ''): ?> <?php echo e(asset('storage/' . auth()->user()->userData->profile_image)); ?>

                <?php else: ?>
                    https://ui-avatars.com/api/?name=<?php echo e(implode('',array_map(function ($word) {return strtoupper($word[0]);}, explode(' ', auth()->user()->name ?? '')))); ?>&color=FFFFFF&background=1f1f1f <?php endif; ?>"
                    alt="<?php echo e(implode('',array_map(function ($word) {return strtoupper($word[0]);}, explode(' ', auth()->user()->name ?? '')))); ?>">
            </button>
        </a>
    </nav>
</header>
<?php /**PATH H:\Bank Project\2025\tradingweb\resources\views/components/header.blade.php ENDPATH**/ ?>