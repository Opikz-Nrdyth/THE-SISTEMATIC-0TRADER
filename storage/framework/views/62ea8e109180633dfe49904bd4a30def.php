<form wire:submit.prevent="submit">
    <?php if (isset($component)) { $__componentOriginal786b6632e4e03cdf0a10e8880993f28a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal786b6632e4e03cdf0a10e8880993f28a = $attributes; } ?>
<?php $component = App\View\Components\Input::resolve(['label' => 'Full Name','placeholder' => 'Full Name','disabled' => 'true','name' => 'full_name','value' => ''.e($full_name).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal786b6632e4e03cdf0a10e8880993f28a)): ?>
<?php $attributes = $__attributesOriginal786b6632e4e03cdf0a10e8880993f28a; ?>
<?php unset($__attributesOriginal786b6632e4e03cdf0a10e8880993f28a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal786b6632e4e03cdf0a10e8880993f28a)): ?>
<?php $component = $__componentOriginal786b6632e4e03cdf0a10e8880993f28a; ?>
<?php unset($__componentOriginal786b6632e4e03cdf0a10e8880993f28a); ?>
<?php endif; ?>
    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-red-500"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    <?php if (isset($component)) { $__componentOriginal786b6632e4e03cdf0a10e8880993f28a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal786b6632e4e03cdf0a10e8880993f28a = $attributes; } ?>
<?php $component = App\View\Components\Input::resolve(['label' => 'Address','placeholder' => 'e.g., 123 Main St, City, Country','disabled' => 'true','name' => 'address','value' => ''.e($address).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal786b6632e4e03cdf0a10e8880993f28a)): ?>
<?php $attributes = $__attributesOriginal786b6632e4e03cdf0a10e8880993f28a; ?>
<?php unset($__attributesOriginal786b6632e4e03cdf0a10e8880993f28a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal786b6632e4e03cdf0a10e8880993f28a)): ?>
<?php $component = $__componentOriginal786b6632e4e03cdf0a10e8880993f28a; ?>
<?php unset($__componentOriginal786b6632e4e03cdf0a10e8880993f28a); ?>
<?php endif; ?>
    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-red-500"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    <?php if (isset($component)) { $__componentOriginal1d0b4f40829d5a36c84d8cd277fdf671 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d0b4f40829d5a36c84d8cd277fdf671 = $attributes; } ?>
<?php $component = App\View\Components\InputImage::resolve(['label' => 'Upload Identity Card','name' => 'identity_card','model' => 'identity_card'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\InputImage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d0b4f40829d5a36c84d8cd277fdf671)): ?>
<?php $attributes = $__attributesOriginal1d0b4f40829d5a36c84d8cd277fdf671; ?>
<?php unset($__attributesOriginal1d0b4f40829d5a36c84d8cd277fdf671); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d0b4f40829d5a36c84d8cd277fdf671)): ?>
<?php $component = $__componentOriginal1d0b4f40829d5a36c84d8cd277fdf671; ?>
<?php unset($__componentOriginal1d0b4f40829d5a36c84d8cd277fdf671); ?>
<?php endif; ?>
    <div wire:loading wire:target="identity_card">Loading Images...</div>
    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['identity_card'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-red-500"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    <?php if (isset($component)) { $__componentOriginal1d0b4f40829d5a36c84d8cd277fdf671 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d0b4f40829d5a36c84d8cd277fdf671 = $attributes; } ?>
<?php $component = App\View\Components\InputImage::resolve(['label' => 'Upload Close Up Photo','name' => 'close_up_photo','model' => 'close_up_photo'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\InputImage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d0b4f40829d5a36c84d8cd277fdf671)): ?>
<?php $attributes = $__attributesOriginal1d0b4f40829d5a36c84d8cd277fdf671; ?>
<?php unset($__attributesOriginal1d0b4f40829d5a36c84d8cd277fdf671); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d0b4f40829d5a36c84d8cd277fdf671)): ?>
<?php $component = $__componentOriginal1d0b4f40829d5a36c84d8cd277fdf671; ?>
<?php unset($__componentOriginal1d0b4f40829d5a36c84d8cd277fdf671); ?>
<?php endif; ?>
    <div wire:loading wire:target="close_up_photo">Loading Images...</div>
    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['close_up_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-red-500"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    <br>
    <button type="submit"
        class="bg-primary mt-3 px-5 py-2 rounded-md text-white flex items-center gap-2 justify-center" id="submit-btn"
        wire:loading.attr="disabled">
        <i class="fa-solid fa-spinner animate-rotate" wire:loading></i> <span>Send Verification</span>
    </button>
</form>
<?php /**PATH /home/kiosmyid/public_html/resources/views/livewire/kyc-form.blade.php ENDPATH**/ ?>