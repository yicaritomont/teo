<!-- Title of Post Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('name', trans('words.Name')); ?>

    <?php echo Form::text('name', null, ['class' => 'input-body']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- URL Input -->
<div class="form-group <?php if($errors->has('url')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('url[]', trans('words.Url')); ?>

    <?php echo Form::select('url', $url, isset($user) ? $user->url->pluck('id')->toArray() : null,  ['class' => 'input-body']); ?>

    <?php if($errors->has('url')): ?> <p class="help-block"><?php echo e($errors->first('url')); ?></p> <?php endif; ?>
</div>

<!-- Modules Input -->
<div class="form-group <?php if($errors->has('modulo_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('modulo[]', trans('words.Modules')); ?>

    <?php echo Form::select('modulo_id', $modulos, isset($user) ? $user->modulos->pluck('id')->toArray() : null,  ['class' => 'input-body']); ?>

    <?php if($errors->has('modulo_id')): ?> <p class="help-block"><?php echo e($errors->first('modulo_id')); ?></p> <?php endif; ?>
</div>

<!-- Menu Input -->
<div class="form-group <?php if($errors->has('menu')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('menu[]', trans('words.MenuPadre') ); ?>

    <?php echo Form::select('menu_id', $menu, isset($user) ? $user->menu->pluck('id')->toArray() : null,  ['class' => 'input-body']); ?>

    <?php if($errors->has('menu_id')): ?> <p class="help-block"><?php echo e($errors->first('menu_id')); ?></p> <?php endif; ?>
</div>