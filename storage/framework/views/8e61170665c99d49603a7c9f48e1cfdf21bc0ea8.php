<?php $__env->startSection('title', 'Posts'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"><?php echo e($result->total()); ?> <?php echo e(str_plural('Post', $result->count())); ?> </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_posts')): ?>
                <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_posts', 'delete_posts')): ?>
                    <th class="text-center">Actions</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->title); ?></td>
                    <td><?php echo e($item->user['name']); ?></td>
                    <td><?php echo e($item->created_at->toFormattedDateString()); ?></td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_posts', 'delete_posts')): ?>
                    <td class="text-center">
                        <?php echo $__env->make('shared._actions', [
                            'entity' => 'posts',
                            'id' => $item->id
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="text-center">
            <?php echo e($result->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>