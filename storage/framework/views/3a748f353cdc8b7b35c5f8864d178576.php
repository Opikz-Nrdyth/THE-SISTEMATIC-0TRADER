<form wire:submit.prevent="regist">
    <div class="mb-4">
        <label class="block text-white mb-2" for="username">
            Username <span class="text-red-500">*</span>
        </label>
        <input wire:model="username" class="w-full px-2 py-3 rounded bg-white text-xs" id="username" name="username"
            type="text" placeholder="Username" />
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-red-500"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="mb-4">
        <label class="block text-white mb-2" for="name">
            Full Name <span class="text-red-500">*</span>
        </label>
        <input wire:model="name" class="w-full px-2 py-3 rounded bg-white text-xs" id="name" name="name"
            type="text" placeholder="Name" />
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-red-500"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="mb-4">
        <label class="block text-white mb-2" for="email">
            Email <span class="text-red-500">*</span>
        </label>
        <input wire:model="email" class="w-full px-2 py-3 rounded bg-white text-xs" id="email" name="email"
            type="text" placeholder="Email" />
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-red-500"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="mb-4">
        <label class="block text-white mb-2" for="password">
            Password <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <input wire:model="password" class="w-full px-2 py-3 rounded bg-white text-xs" id="password"
                name="password" type=<?php echo e($showPassword ? 'text' : 'password'); ?> placeholder="Password" />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

            <div class="cursor-pointer absolute right-2 top-3 flex items-center" wire:click="show_password">
                <!--[if BLOCK]><![endif]--><?php if($showPassword): ?>
                    <i class="fa-solid fa-eye-slash"></i>
                <?php else: ?>
                    <i class="fa-solid fa-eye"></i>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    <div class="mb-4">
        <label class="block text-white mb-2" for="conf_pass">
            Confirm Password <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <input wire:model="confirm_password" class="w-full px-2 py-3 rounded bg-white text-xs" id="conf_pass"
                name="password" type=<?php echo e($showPassword ? 'text' : 'password'); ?> placeholder="Confirm Password" />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

            <div class="cursor-pointer absolute right-2 top-3 flex items-center" wire:click="show_password">
                <!--[if BLOCK]><![endif]--><?php if($showPassword): ?>
                    <i class="fa-solid fa-eye-slash"></i>
                <?php else: ?>
                    <i class="fa-solid fa-eye"></i>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    <div class="mb-4">
        <label class="block text-white mb-2" for="referals">
            Referals <span class="text-red-500">*</span>
        </label>
        <input wire:model="referals" class="w-full px-2 py-3 rounded bg-white text-xs" id="referals" name="username"
            type="text" placeholder="Username Referals" />
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['referals'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-red-500"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <button class="w-full bg-blue-600 text-white py-2 rounded" type="submit" wire:loading.attr="disabled">
        <i class="fa-solid fa-spinner animate-rotate" wire:loading></i>
        Register
    </button>
</form>
<?php /**PATH /home/kiosmyid/public_html/resources/views/livewire/register.blade.php ENDPATH**/ ?>