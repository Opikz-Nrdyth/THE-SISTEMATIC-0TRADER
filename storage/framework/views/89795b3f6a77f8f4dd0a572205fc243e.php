<div class="flex justify-start items-center gap-3 p-2 bg-base-card hover:bg-base-text group-odd:">
    <div class="w-[35px] h-[35px]">
        <img src="<?php echo e($profile); ?>" alt="<?php echo e($user); ?>" class="w-full h-full">
    </div>
    <div class="text-gray-200 w-[80%] text-xs text-justify hover:text-black">
        <?php echo Str::limit(strip_tags($comment), 255); ?>

        <p class="text-primary mt-3 text-xs">
            <?php echo e($updatedAt); ?>

        </p>
    </div>
</div>
<?php /**PATH /home/kiosmyid/public_html/resources/views/components/comment.blade.php ENDPATH**/ ?>