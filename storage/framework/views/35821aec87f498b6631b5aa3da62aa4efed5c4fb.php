<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>	
		
		<h2>Bienvenido <?php echo e($datos['nombre_persona']); ?></h2>
		<div>
			<?php if($datos['usuario_nuevo'] == 0): ?>
				
				Ha sido asignado como <b><?php echo e($datos['perfil']); ?></b>
				
				Recuerde que para acceder en http://190.85.28.74:8901/inspecciones/public/login ,
				con su usuario ya asignado.

			<?php else: ?>
				
				Ha sido asignado como <b><?php echo e($datos['perfil']); ?></b>.
				
				
				<br>
				Se ha asignado un usuario para acceder a http://190.85.28.74:8901/inspecciones/public/login , 
				con las siguientes llaves de acceso : 
				<br>
				<br>
				<b> Usuario : </b> <?php echo e($datos['usuario']); ?>

				<br>
				<b> Contrase&ntilde;a : </b> <?php echo e($datos['contrasena']); ?>

				<br>
				Al ingresar el aplicativo le solicitar&aacute; cambio de contrase&ntilde;a.

				
			<?php endif; ?>

			<br>
			Las compa&ntilde;ia en las que se encuentra asociado son las siguientes :
			<ul>
				<?php $__currentLoopData = $datos['companies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li> <?php echo e($companies); ?> </li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
			

			<i>Este correo es generado autom&aacute;ticamente, por favor no responder.</i>
		</div>


		
	</body>
</html>
