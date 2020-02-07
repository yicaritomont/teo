<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 ">
    	<h1 class="text-center login-title"><?php echo e(trans('words.ChangeCompany')); ?> <span class="glyphicon glyphicon-wrench"></span></h1>
    	<hr>
        <div class="well contenedor-anclas">
            <fieldset>
			
            	<ul class="list-group">
            		<?php $__currentLoopData = $companias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compania): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    											  		
					

					  	<li class="list-group-item" >
		                    <a href="<?php echo e(URL::to('enviaCompania',array('compania'=>$compania->company_id))); ?>">
								<button style="width:100%" class="text-center btn-login departamento ladda-button" role="alert" data-style="expand-left" data-spinner-color="#000000">
									<span class="glyphicon glyphicon-circle-arrow-right"></span>
									<span class="ladda-label "> <b><?php echo e(App\User::find(App\Company::find($compania->company_id)->user_id)->name); ?></b></span>
			                    </button>
		                    </a>				  		
						</li>
				  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
            </fieldset>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>