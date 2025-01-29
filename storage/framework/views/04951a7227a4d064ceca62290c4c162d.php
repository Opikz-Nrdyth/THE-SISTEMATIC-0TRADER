<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-gray-800 bg-opacity-75 p-8 rounded-lg shadow-lg w-full max-w-md border-2 border-primary">
        <div class="text-center mb-6">
            <img alt="Logo of a wolf head with text 'The Systematic Trader'" class="mx-auto mb-4" height="100"
                src="/public/storage/<?php echo e(\App\Models\setting::first()->company_logo); ?>" width="100" />
            <!--<div class="flex justify-center">-->
            <!--    <a href="/login">-->
            <!--        <button class="bg-blue-600 text-white py-2 px-4 rounded-l-full hover:bg-blue-700">-->
            <!--            Login-->
            <!--        </button>-->
            <!--    </a>-->
            <!--    <a href="/register">-->
            <!--        <button class="bg-blue-600 text-white py-2 px-4 rounded-r-full hover:bg-blue-700">-->
            <!--            Register-->
            <!--        </button>-->
            <!--    </a>-->
            <!--    <button class="bg-blue-600 text-white py-2 px-4 rounded-r-full hover:bg-blue-700">-->
            <!--        Forgot Password-->
            <!--    </button>-->
            <!--</div>-->
        </div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('Login', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3534488287-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kiosmyid/public_html/resources/views/LoginPanel.blade.php ENDPATH**/ ?>