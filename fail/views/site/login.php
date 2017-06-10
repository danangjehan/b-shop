<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
?>

<ul class="tab-group">
        <li class="tab active" id="tablogin"><a href="#login">Log In</a></li>
        <li class="tab" id="tabsignup"><a href="#signup">Sign Up</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <?php $form = ActiveForm::begin([
            'id' => 'login-form',
        ]); ?>

            <?= $form->field($model, 'username') ?>

            <?= $form->field($model, 'password')->passwordInput(['id'=>'password2']) ?>

             <button type="submit" class="button button-block" />Login</button>

        <?php ActiveForm::end(); ?>
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary btn-facebook btn-flat"><i class="fa fa-facebook-official"></i> Sign in
                    using Facebook</a>
                <a href="#" class="btn btn-block btn-danger btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                    in using Google+</a>
            </div>
        </div>
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="/" method="post">
          
          <div class="form-group">
            <label>
              User Name
            </label>
            <input type="text"required autocomplete="off" id="username" class="form-control" />
          </div>

          <div class="form-group">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" id="email" class="form-control"/>
            <!-- <div id="messages"></div> -->
          </div>

          <div class="form-group">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" id="password" class="form-control"/>
            <div id="messages"></div>
          </div>
          
          <div class="form-group">
            <label>
              Retype Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" id="retype" class="form-control"/>
          </div>

          <div class="form-group">
            <label>
              Alamat<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" id="alamat" class="form-control"/>
          </div>

          <div class="form-group">
            <label>
              Nomor Telepon<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off" id="noTlp" class="form-control"/>
          </div>
          
          <button type="button" class="button button-block" id="btnSignUp" />SIGN UP</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
<!-- <script src="<?= Yii::$app->homeUrl; ?>js/jquery.min.js"></script> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="<?= Yii::$app->homeUrl; ?>js/bootstrap.js"></script>
<script src="<?= Yii::$app->homeUrl; ?>js/bootstrap-show-password.js"></script>
<script src="//wenzhixin.net.cn/js/analytics.js"></script> -->
      <script>
    $(function() {
        var sprintf = function(str) {
        var args = arguments,
            flag = true,
            i = 1;

        str = str.replace(/%s/g, function () {
            var arg = args[i++];

            if (typeof arg === 'undefined') {
                flag = false;
                return '';
            }
            return arg;
        });
        if (flag) {
            return str;
        }
        return '';
    };

    // PASSWORD CLASS DEFINITION
    // ======================

    var Password = function(element, options) {
        this.options   = options;
        this.$element  = $(element);
        this.isShown = false;

        this.init();
    };

    Password.DEFAULTS = {
        placement: 'after', // 'before' or 'after'
        white: false, // v2
        message: 'Click here to show/hide password',
        eyeClass: 'glyphicon',
        eyeOpenClass: 'glyphicon-eye-open',
        eyeCloseClass: 'glyphicon-eye-close'
    };

    Password.prototype.init = function() {
        var placementFuc,
            inputClass; // v2 class

        if (this.options.placement === 'before') {
            placementFuc = 'insertBefore';
            inputClass = 'input-prepend';
        } else {
            this.options.placement = 'after'; // default to after
            placementFuc = 'insertAfter';
            inputClass = 'input-append';
        }

        // Create the text, icon and assign
        this.$element.wrap(sprintf('<div class="%s input-group" />', inputClass));

        this.$text = $('<input type="text" />')
            [placementFuc](this.$element)
            .attr('class', this.$element.attr('class'))
            .attr('style', this.$element.attr('style'))
            .attr('placeholder', this.$element.attr('placeholder'))
            .css('display', this.$element.css('display'))
            .val(this.$element.val()).hide();

        // Copy readonly attribute if it's set
        if (this.$element.prop('readonly'))
            this.$text.prop('readonly', true);

        this.$icon = $([
            '<span tabindex="100" title="' + this.options.message + '" class="add-on input-group-addon">',
            '<i class="icon-eye-open' + (this.options.white ? ' icon-white' : '') +
                ' ' + this.options.eyeClass + ' ' + this.options.eyeOpenClass + '"></i>',
            '</span>'
        ].join(''))[placementFuc](this.$text).css('cursor', 'pointer');

        // events
        this.$text.off('keyup').on('keyup', $.proxy(function() {
            if (!this.isShown) return;
            this.$element.val(this.$text.val()).trigger('change');
        }, this));

        this.$icon.off('click').on('click', $.proxy(function() {
            this.$text.val(this.$element.val()).trigger('change');
            this.toggle();
        }, this));
    };

    Password.prototype.toggle = function(_relatedTarget) {
        this[!this.isShown ? 'show' : 'hide'](_relatedTarget);
    };

    Password.prototype.show = function(_relatedTarget) {
        var e = $.Event('show.bs.password', {relatedTarget: _relatedTarget});
        this.$element.trigger(e);

        this.isShown = true;
        this.$element.hide();
        this.$text.show();
        this.$icon.find('i')
            .removeClass('icon-eye-open ' + this.options.eyeOpenClass)
            .addClass('icon-eye-close ' + this.options.eyeCloseClass);

        // v3 input-group
        this.$text[this.options.placement](this.$element);
    };

    Password.prototype.hide = function(_relatedTarget) {
        var e = $.Event('hide.bs.password', {relatedTarget: _relatedTarget});
        this.$element.trigger(e);

        this.isShown = false;
        this.$element.show();
        this.$text.hide();
        this.$icon.find('i')
            .removeClass('icon-eye-close ' + this.options.eyeCloseClass)
            .addClass('icon-eye-open ' + this.options.eyeOpenClass);

        // v3 input-group
        this.$element[this.options.placement](this.$text);
    };

    Password.prototype.val = function (value) {
        if (typeof value === 'undefined') {
            return this.$element.val();
        } else {
            this.$element.val(value).trigger('change');
            this.$text.val(value);
        }
    };


    // PASSWORD PLUGIN DEFINITION
    // =======================

    var old = $.fn.password;

    $.fn.password = function() {
        var option = arguments[0],
            args = arguments,

            value,
            allowedMethods = ['show', 'hide', 'toggle', 'val']; // public function

        this.each(function() {
            var $this = $(this),
                data = $this.data('bs.password'),
                options = $.extend({}, Password.DEFAULTS, $this.data(), typeof option === 'object' && option);

            if (typeof option === 'string') {
                if ($.inArray(option, allowedMethods) < 0) {
                    throw "Unknown method: " + option;
                }
                value = data[option](args[1]);
            } else {
                if (!data) {
                    data = new Password($this, options);
                    $this.data('bs.password', data);
                } else {
                    data.init(options);
                }
            }
        });

        return value ? value : this;
    };

    $.fn.password.Constructor = Password;


    // PASSWORD NO CONFLICT
    // =================

    $.fn.password.noConflict = function() {
        $.fn.password = old;
        return this;
    };

    $(function () {
        $('[data-toggle="password"]').password();
    });
        $('#password').password().on('show.bs.password', function(e) {
            $('#eventLog').text('On show event');
            $('#methods').prop('checked', true);
        }).on('hide.bs.password', function(e) {
                    $('#eventLog').text('On hide event');
                    $('#methods').prop('checked', false);
                });
        $('#methods').click(function() {
            $('#password').password('toggle');
        });

        $('#retype').password().on('show.bs.password', function(e) {
            $('#eventLog').text('On show event');
            $('#methods').prop('checked', true);
        }).on('hide.bs.password', function(e) {
                    $('#eventLog').text('On hide event');
                    $('#methods').prop('checked', false);
                });
        $('#methods').click(function() {
            $('#retype').password('toggle');
        });

        $('#password2').password().on('show.bs.password', function(e) {
            $('#eventLog').text('On show event');
            $('#methods').prop('checked', true);
        }).on('hide.bs.password', function(e) {
                    $('#eventLog').text('On hide event');
                    $('#methods').prop('checked', false);
                });
        $('#methods').click(function() {
            $('#password2').password('toggle');
        });
    });

$('#tabsignup').click(function(){
    document.title = 'Sign UP';
});

$('#tablogin').click(function(){
    document.title = 'Login';
});

// $('#email').on('change', function(e){
//     var userinput = $(this).val();
//     var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

//     if(!pattern.test(userinput)){
//         alert('not a valid e-mail address');
//     }
// });
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script type="text/javascript">
$('#btnSignUp').click(function(){
    // alert('cok');
    var username = $('#username').val();
    var password = $('#password').val();
    var retype = $('#retype').val();
    var alamat = $('#alamat').val();
    var noTlp = $('#noTlp').val();
    var email = $('#email').val();
    if(username == '' || password == '' || retype == '' || alamat == '' || noTlp == '' || email == '' ){
        alert('Please Enter Your Data');
    }else{
        if(password != retype){
            alert('No Match Password');
        }else{
             $.ajax({
                url : "<?= Yii::$app->homeUrl ?>site/signup",
                data : {
                    username : username,
                    password : password,
                    alamat : alamat,
                    noTlp : noTlp,
                    email : email,
                },
                dataType : "html",
                type : "post"
            }).done(function(data){
                // $("#hasil").html(data);
                console.log(data);
                // $("#cetakpdf").removeClass("sdisabled");
            });
        }
    }
});
</script>
