<div class="mt-4">
    <label for="<?php echo e($name); ?>" class="block mb-2 text-sm "><?php echo e($label); ?></label>
    <div class="flex items-center border rounded-md bg-base-input text-white">
        <input type="text" id="<?php echo e($name); ?>_text" readonly
            class="flex-grow py-2 px-3 bg-transparent placeholder-gray-600 focus:outline-none">
        <label for="<?php echo e($name); ?>"
            class="px-3 py-3 bg-primary text-white text-sm font-medium cursor-pointer rounded-r-md">
            Select File
        </label>
        <input type="file" wire:model="<?php echo e($model); ?>" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
            class="hidden"
            onchange="document.getElementById('<?php echo e($name); ?>_text').value = this.files[0]?.name || ''">
    </div>
</div>
<?php /**PATH /home/kiosmyid/public_html/resources/views/components/input-image.blade.php ENDPATH**/ ?>