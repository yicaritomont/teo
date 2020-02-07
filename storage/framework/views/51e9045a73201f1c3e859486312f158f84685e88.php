<!-- Name of Menu Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('name', trans('words.Name')); ?>

    <?php echo Form::text('name', null, ['class' => 'input-body']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- Si es un item desplegable no se mostrará el campo url -->
<?php if (! (isset($menus) && !$menus['url'])): ?>
    <!-- URL Input -->
    <div class="form-group <?php if($errors->has('url')): ?> has-error <?php endif; ?>">
        <?php echo Form::label('url', trans('words.Url')); ?>

        <?php echo Form::select('url', $url, isset($user) ? $user->url->pluck('id')->toArray() : null,  ['class' => 'input-body', 'placeholder' => (isset($menus) && $menus['url']) ? trans('words.ChooseOption') : trans('words.DropdownMenu')]); ?>

        
        <?php if($errors->has('url')): ?> <p class="help-block"><?php echo e($errors->first('url')); ?></p> <?php endif; ?>
    </div> 
<?php endif; ?>


<!-- Menu Input -->
<div class="form-group <?php if($errors->has('menu_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('menu_id', trans('words.MenuPadre') ); ?>

    <?php echo Form::select('menu_id', $menu, isset($user) ? $user->menu->pluck('id')->toArray() : null,  ['class' => 'input-body', 'placeholder' => trans('words.ChooseOption')]); ?>

    <?php if($errors->has('menu_id')): ?> <p class="help-block"><?php echo e($errors->first('menu_id')); ?></p> <?php endif; ?>
</div>

<!-- Icon Input -->
<div class="form-group picker <?php if($errors->has('icon')): ?> has-error <?php endif; ?>">
    
    <?php echo Form::label('icon', trans('words.Icon') ); ?>

    
    <div class="input-group">
        <span class="input-group-addon"><i class="fa <?php echo e(isset($menus->icon) ? $menus->icon : 'fa-hashtag'); ?>"></i></span>
        <?php echo Form::text('icon', null, ['class' => 'input-body inputpicker', 'autocomplete' => 'off', 'disabled' => 'disabled']); ?>

        
    </div>
    <?php if($errors->has('icon')): ?> <p class="help-block"><?php echo e($errors->first('icon')); ?></p> <?php endif; ?>
</div>

<input type="hidden" name="icon" id="icon-hidden" value="<?php echo e(isset($menus) ? $menus->icon : null); ?>">