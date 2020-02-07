<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_'.$entity)): ?>
    <a href="<?php echo e(route($entity.'.edit', [str_singular($entity) => $id])); ?>" class="btn btn-xs btn-info">
        <i class="fa fa-edit"></i></a>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_'.$entity)): ?>
    <?php echo Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are your sure wanted to delete it?")']); ?>

        <button type="submit" class="btn-delete btn btn-xs btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    <?php echo Form::close(); ?>

<?php endif; ?>
