<div class="bg-base-card p-6 rounded-lg shadow-lg text-base-text">
    <h2 class="text-xl font-bold text-primary mb-4 text-center"><?php echo e($plan); ?></h2>
    <ul class="mb-4">
        <li>Min. Amount <?php echo e(session('currency')); ?> <?php echo e($min); ?></li>
        <li>Max. Amount <?php echo e(session('currency')); ?> <?php echo e($max); ?></li>
        <li>Contract <?php echo e($minContract); ?> - <?php echo e($maxContract); ?> Hours</li>
    </ul>
    <form wire:submit.prevent="invest">
        <div class="mb-4 flex">
            <input type="text" disabled placeholder="<?php echo e(session('currency')); ?>"
                class="bg-base-input-disabled text-white p-2 rounded-l w-1/4">
            <input type="text" placeholder="Amount" wire:model="amount"
                class="bg-base-input text-white p-2 rounded-r w-3/4">
        </div>
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-red-500"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        <button class="bg-primary text-white py-2 px-4 rounded w-full flex items-center justify-center gap-2"
            wire:loading.attr="disabled"><i class="fa-solid fa-spinner animate-rotate" wire:loading></i>
            INVEST NOW</button>
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['alert'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-red-500"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-green-500"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </form>
</div>
<?php /**PATH H:\Bank Project\2025\tradingweb\resources\views/livewire/plan-chart.blade.php ENDPATH**/ ?>