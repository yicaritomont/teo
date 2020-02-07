<?php $__env->startSection('title', trans('words.ManageUsers')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">            
                <h3 class="modal-title"> <?php echo e(str_plural(trans('words.User'), 2)); ?> </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            
            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-user"></i> <?php echo app('translator')->getFromJson('words.Login'); ?></a>

            
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Email'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th> 
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users', 'delete_users')): ?>
                <th class="text-center"><?php echo app('translator')->getFromJson('words.Actions'); ?></th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($users) && count($users)>0): ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($user->id); ?></th>
                        <th><?php echo e($user->name); ?></th>
                        <th><?php echo e($user->email); ?></th>
                        <th><?php echo e($user->created_at); ?></th>
                        <th><?php echo e($user->updated_at); ?></th> 
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users', 'delete_users')): ?>
                        <th class="text-center"><?php echo app('translator')->getFromJson('words.Actions'); ?></th>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <td colspan="6"> CLEAN</td>
            <tr>
            <?php endif; ?>
            </tbody
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>