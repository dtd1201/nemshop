<header id="header">
	<div class="container">
		<div class="header-content">
			<?php if($header['logo']): ?>
			<a href="<?php echo e(makeLink('home')); ?>" class="logo">
				<img src="<?php echo e(asset($header['logo']->image_path)); ?>" alt="<?php echo e($header['logo']->name); ?>" />
			</a>
			<?php endif; ?>
			<?php if($header['menu']): ?>
			<nav class="header-nav">
				<?php $__currentLoopData = $header['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a href="<?php echo e($header['url']); ?>#<?php echo e($item->slug); ?>" class="header-nav-link"><?php echo e($item->name); ?></a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
				<?php if($header['hotline']): ?>
				<a href="tel:<?php echo e($header['hotline']->slug); ?>" class="header-nav-item">
					<div class="icon">
					<img src="./assets/images/icon/phone.svg" alt="phone" />
					</div>
					<p class="text"><?php echo e($header['hotline']->value); ?></p>
				</a>
				<?php endif; ?>
			</nav>
			<nav class="header-nav-mobile">
				<div class="close-button">
					<i class="fa-solid fa-xmark"></i>
				</div>
				<?php $__currentLoopData = $header['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a href="<?php echo e($header['url']); ?>#<?php echo e($item->slug); ?>" class="header-nav-link"><?php echo e($item->name); ?></a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
				<?php if($header['hotline']): ?>
				<a href="tel:<?php echo e($header['hotline']->slug); ?>" class="header-nav-item">
					<div class="icon">
					<img src="./assets/images/icon/phone.svg" alt="phone" />
					</div>
					<p class="text"><?php echo e($header['hotline']->value); ?></p>
				</a>
				<?php endif; ?>
			</nav>
			<?php endif; ?>
			<div class="menu-button">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>
	</div>
</header>
<?php /**PATH C:\xampp\htdocs\demola\resources\views/frontend/partials/header.blade.php ENDPATH**/ ?>