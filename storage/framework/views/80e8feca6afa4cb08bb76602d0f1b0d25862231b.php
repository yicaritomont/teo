<?php if($item['submenu'] == []): ?>

    <?php if($item['url']): ?>
        <li>
            <a href="<?php echo e(route($item['url'].'.index')); ?>"><span></span>
                <?php if($item['icon']): ?><i class="icon-menu fa <?php echo e($item['icon']); ?>"></i><?php endif; ?>
                <?php echo app('translator')->choice('words.'.$item['name'], 2); ?>
            </a>
        </li>
    <?php endif; ?>

<?php else: ?>

    <li>
        <a>
            <?php if($item['icon']): ?><i class="icon-menu fa <?php echo e($item['icon']); ?>"></i><?php endif; ?> <?php echo app('translator')->choice('words.'.$item['name'], 2); ?><span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu">
            <?php $__currentLoopData = $item['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($submenu['submenu'] == []): ?>
                    <li>
                        <a href="<?php echo e(route($submenu['url'].'.index')); ?>">
                            <?php if($submenu['icon']): ?><i class="icon-menu fa <?php echo e($submenu['icon']); ?>"></i><?php endif; ?>
                            <?php echo app('translator')->choice('words.'.$submenu['name'], 2); ?>
                        </a>
                    </li>
                <?php else: ?>
                    <?php echo $__env->make('shared.menu-item', [ 'item' => $submenu ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>

<?php endif; ?>