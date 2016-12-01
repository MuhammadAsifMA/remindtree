
<style>
body > div.content-wrap > div > div.left-content > div > div > div:nth-child(2) > div > div > div > div > form > div > div.col-lg-4 > div > button.disabled {
background-color: rgba(54, 54, 54, 0.52);
pointer-events: unset;
}

</style>
<div class="col-lg-12 col-md-12   no-padding">
    <div class="form-wrapper2">
        <!-- class="right-wrapper" -->
        <div class="top-form2">
            
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger" id="errors">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
            <form class="form-material" data-toggle="validator" method="POST" action="<?php echo e(url('/login')); ?>">
                 <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <div class="col-md-12">
                                <input id="email" type="email" name="email" class="form-control form-control-line" placeholder="jon-doe@email.com" data-error="Unvalid email address" required>
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" id="password" name="password" placeholder="password" data-error="You need to use a password" required>
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default  button">SignIn</button>
                        </div>
                    </div>
                </div>
            </form>

            <hr class="style15">

            <div class=" text-left">
                <a class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i> Sign in with Facebook
                </a>
            </div>

            <div class="notice text-left">
                <p>By creating account, you agree to the <a href="style-one-image.html#">Terms of Service</a></p>
            </div>


        </div>
    </div>
</div>