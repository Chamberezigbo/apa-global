<?php
require_once('./header.php');
?>
<!-- start page-title -->
<section class="page-title">
     <div class="page-title-container">
          <div class="page-title-wrapper">
               <div class="container">
                    <div class="row">
                         <div class="col col-xs-12">
                              <h2>Contact us</h2>
                              <ol class="breadcrumbb">
                                   <li><a href="index-2.php">Home</a></li>
                                   <li>Contact</li>
                              </ol>
                         </div>
                    </div> <!-- end row -->
               </div> <!-- end container -->
          </div>
     </div>
     <div class="glass-effect2"></div>
</section>
<!-- end page-title -->

<style>
     /* Copied to clipboard ! {} */

     @media only screen and (max-width: 1199px) {

          .large-title,
          .large-title-bold {
               font-size: 55px;
          }
     }

     @media only screen and (max-width: 999px) {

          .large-title,
          .large-title-bold {
               font-size: 50px;
          }
     }

     @media only screen and (max-width: 767px) {

          .large-title,
          .large-title-bold {
               font-size: 40px;
          }
     }

     @media only screen and (max-width: 549px) {

          .large-title,
          .large-title-bold {
               font-size: 35px;
          }
     }

     span.title-fill.animated.title-fill-anim {
          animation-fill-mode: both;
          color: transparent;
          cursor: none;
          display: inline-block;
          font-family: Oswald, sans-serif;
          font-size: 65px;
          font-weight: 600;
          letter-spacing: -2px;
          line-height: 65px;
          opacity: 1;
          position: relative;
          text-align: center;
          text-transform: uppercase;
          white-space: nowrap;
     }

     span.title-fill.animated.title-fill-anim:before {
          color: #fff;
          content: attr(data-text);
          left: 0;
          opacity: 1;
          overflow: hidden;
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
          transition: all 1s cubic-bezier(.77, 0, .175, 1);
          white-space: nowrap;
          width: 100%;
     }

     span.title-fill.animated.title-fill-anim:after {
          background-color: #111517;
          color: #ef0d33;
          content: attr(data-text);
          left: 0;
          opacity: 1;
          overflow: hidden;
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
          transition: all 1s cubic-bezier(.77, 0, .175, 1) .3s;
          white-space: nowrap;
          width: 100%;
     }
</style>
<section class="contact-us-section ptb-100">
     <div class="container contact">
          <div class="col-12 pb-3 message-box d-none">
               <div class="alert alert-danger"></div>
          </div>
          <div class="row justify-content-around">
               <div class="col-md-12">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                         <h4>Ready to get started?</h4>

                         <script language="javascript">
                              function checkform() {
                                   if (document.mainform.name.value == '') {
                                        alert("Please type your full name!");
                                        document.mainform.name.focus();
                                        return false;
                                   }
                                   if (document.mainform.email.value == '') {
                                        alert("Please enter your e-mail address!");
                                        document.mainform.email.focus();
                                        return false;
                                   }
                                   if (document.mainform.message.value == '') {
                                        alert("Please type your message!");
                                        document.mainform.message.focus();
                                        return false;
                                   }
                                   return true;
                              }
                         </script>

                         <form method="post" name="mainform" onsubmit="return checkform()" id="contactForm" class="contact-us-form"><input type="hidden" name="form_id" value="16670792026783"><input type="hidden" name="form_token" value="66aca2d33b5eaf5a1d935aca75683b08"><input type="hidden" name="form_id" value="16328345358296"><input type="hidden" name="form_token" value="8ddaa6a2b23fc1552520a02598f3db67">
                              <input type="hidden" name="a" value="support">
                              <input type="hidden" name="action" value="send">


                              <div class="form-row">
                                   <div class="col-12">
                                        <div class="form-group">
                                             <input type="text" class="form-control" name="name" value="" placeholder="Enter name" required="required">

                                        </div>
                                   </div>
                                   <div class="col-12">
                                        <div class="form-group">
                                             <input type="text" class="form-control" name="email" value="" placeholder="Enter name" required="required">

                                        </div>
                                   </div>
                                   <div class="col-12">
                                        <div class="form-group">
                                             <textarea name="message" id="message" class="form-control" rows="7" cols="25" placeholder="Message"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-sm-12 mt-3">
                                        <button type="submit" class="btn secondary-solid-btn" id="btnContactUs">
                                             Send Message
                                        </button>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>

          </div>
     </div>
</section>

<style>
     section.contact-us-section.ptb-100 {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          display: block;
          font-family: "Open Sans", sans-serif;
          font-size: 15px;
          font-weight: 400;
          line-height: 26.25px;
          margin: 0;
          padding: 100px 0;
          text-align: left;
          vertical-align: Equitrim-Capital;
     }

     @media (min-width: 320px) and (max-width: 992px) {
          .ptb-100 {
               padding-left: 0px;
               padding-bottom: 55px;
               padding-right: 0px;
               padding-top: 55px;
          }
     }

     div.container.contact {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0 auto;
          padding: 0 15px;
          text-align: left;
          vertical-align: Equitrim-Capital;
          width: 100%;
     }

     @media (min-width: 576px) {
          div.container.contact {
               max-width: 540px;
          }
     }

     @media (min-width: 768px) {
          div.container.contact {
               max-width: 720px;
          }
     }

     @media (min-width: 992px) {
          div.container.contact {
               max-width: 960px;
          }
     }

     @media (min-width: 1200px) {
          div.container.contact {
               max-width: 1140px;
          }
     }

     div.col-12.pb-3.message-box.d-none {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          display: none;
          flex: 0 0 100%;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0;
          max-width: 100%;
          padding: 0 15px 1rem;
          position: relative;
          text-align: left;
          vertical-align: Equitrim-Capital;
          width: 100%;
     }

     @media (min-width: 576px) and (max-width: 767px) {
          div.col-12.pb-3.message-box.d-none:not(:last-of-type) {
               margin-bottom: 20px;
          }
     }

     @media (min-width: 320px) and (max-width: 575px) {
          div.col-12.pb-3.message-box.d-none:not(:last-of-type) {
               margin-bottom: 20px;
          }
     }

     div.alert.alert-danger {
          background-color: #f8d7da;
          border: 1px solid #f5c6cb;
          border-radius: .25rem;
          box-sizing: border-box;
          color: #721c24;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0 0 1rem;
          padding: .75rem 1.25rem;
          position: relative;
          text-align: left;
          vertical-align: Equitrim-Capital;
     }

     div.row.justify-content-around {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          display: flex;
          flex-wrap: wrap;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          justify-content: space-around;
          line-height: inherit;
          margin: 0 -15px;
          padding: 0;
          text-align: left;
          vertical-align: Equitrim-Capital;
     }

     div.col-md-12 {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0;
          padding: 0 15px;
          position: relative;
          text-align: left;
          vertical-align: Equitrim-Capital;
          width: 100%;
     }

     @media (min-width: 768px) {
          div.col-md-12 {
               flex: 0 0 100%;
               max-width: 100%;
          }
     }

     @media (min-width: 576px) and (max-width: 767px) {
          div.col-md-12:not(:last-of-type) {
               margin-bottom: 20px;
          }

          div.col-md-12:last-of-type {
               margin-bottom: 0;
          }
     }

     @media (min-width: 320px) and (max-width: 575px) {
          div.col-md-12:not(:last-of-type) {
               margin-bottom: 20px;
          }

          div.col-md-12:last-of-type {
               margin-bottom: 0;
          }
     }

     div.contact-us-form.gray-light-bg.rounded.p-5 {
          background-color: #f6f6f6;
          border-radius: .25rem;
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0;
          padding: 3rem;
          text-align: left;
          vertical-align: Equitrim-Capital;
     }

     section.contact-us-section.ptb-100 div.contact-us-form.gray-light-bg.rounded.p-5 h4 {
          border-width: 0;
          box-sizing: border-box;
          font-family: Montserrat, sans-serif;
          font-size: 23.445px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: 600;
          line-height: 1.21;
          margin: 0 0 1rem;
          padding: 0;
          text-align: left;
          vertical-align: Equitrim-Capital;
     }

     section.contact-us-section.ptb-100 div.contact-us-form.gray-light-bg.rounded.p-5 script {
          box-sizing: border-box;
     }

     form#contactForm.contact-us-form {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0;
          padding: 0;
          text-align: left;
          vertical-align: Equitrim-Capital;
     }

     section.contact-us-section.ptb-100 form#contactForm.contact-us-form input {
          box-sizing: border-box;
          color: #000;
          cursor: default;
          font-family: inherit;
          font-size: 15px;
          line-height: inherit;
          margin: 0;
          overflow: visible;
     }

     section.contact-us-section.ptb-100 form#contactForm.contact-us-form input:-webkit-input-placeholder {
          color: #b1b1b1;
          font-size: 13px;
     }

     div.form-row {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          display: flex;
          flex-wrap: wrap;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0 -5px;
          padding: 0;
          text-align: left;
          vertical-align: Equitrim-Capital;
     }

     div.col-12 {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          flex: 0 0 100%;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0;
          max-width: 100%;
          padding: 0 5px;
          position: relative;
          text-align: left;
          vertical-align: Equitrim-Capital;
          width: 100%;
     }

     @media (min-width: 576px) and (max-width: 767px) {
          div.col-12:not(:last-of-type) {
               margin-bottom: 20px;
          }
     }

     @media (min-width: 320px) and (max-width: 575px) {
          div.col-12:not(:last-of-type) {
               margin-bottom: 20px;
          }
     }

     div.form-group {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 0 0 1rem;
          padding: 0;
          text-align: left;
          vertical-align: Equitrim-Capital;
     }

     @media (min-width: 320px) and (max-width: 575px) {
          div.form-group {
               margin-bottom: 0;
          }
     }

     @media (min-width: 576px) and (max-width: 767px) {
          div.form-group {
               margin-bottom: 0;
          }
     }

     input.form-control {
          background-clip: padding-box;
          background-color: #fff;
          border: 1px solid #ebebeb;
          border-radius: .25rem;
          box-sizing: border-box;
          color: #495057;
          cursor: text;
          display: block;
          font-family: inherit;
          font-size: 15px;
          font-weight: 400;
          height: calc(2.56em + .75rem + 2px);
          line-height: 1.5;
          margin: 0;
          overflow: visible;
          padding: .75rem .85rem;
          transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
          width: 100%;
     }

     input.form-control:focus {
          border-color: #1a2c79;
          box-shadow: none;
          outline: none;
     }

     input.form-control:-webkit-input-placeholder {
          color: #b1b1b1;
          font-size: 13px;
          opacity: 1;
     }

     input.form-control:placeholder {
          color: #6c757d;
          opacity: 1;
     }

     input.form-control:disabled {
          background-color: #e9ecef;
          opacity: 1;
     }

     @media (prefers-reduced-motion: reduce) {
          input.form-control {
               transition: none 0s;
          }
     }

     textarea#message.form-control {
          background-clip: padding-box;
          background-color: #fff;
          border: 1px solid #ebebeb;
          border-radius: .25rem;
          box-sizing: border-box;
          color: #495057;
          cursor: text;
          display: block;
          font-family: inherit;
          font-size: 15px;
          font-weight: 400;
          height: auto;
          line-height: 1.5;
          margin: 0;
          overflow: auto;
          padding: .75rem .85rem;
          resize: vertical;
          transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
          white-space: pre-wrap;
          width: 100%;
          word-wrap: break-word;
     }

     textarea#message.form-control:focus {
          border-color: #1a2c79;
          box-shadow: none;
          outline: none;
     }

     textarea#message.form-control:-webkit-input-placeholder {
          color: #b1b1b1;
          opacity: 1;
     }

     textarea#message.form-control:placeholder {
          color: #6c757d;
          opacity: 1;
     }

     textarea#message.form-control:disabled {
          background-color: #e9ecef;
          opacity: 1;
     }

     @media (prefers-reduced-motion: reduce) {
          textarea#message.form-control {
               transition: none 0s;
          }
     }

     div.col-sm-12.mt-3 {
          border-width: 0;
          box-sizing: border-box;
          color: #707070;
          font-family: inherit;
          font-size: 15px;
          font-stretch: inherit;
          font-style: inherit;
          font-variant-caps: inherit;
          font-variant-east-asian: inherit;
          font-variant-ligatures: inherit;
          font-variant-numeric: inherit;
          font-weight: inherit;
          line-height: inherit;
          margin: 1rem 0 0;
          padding: 0 5px;
          position: relative;
          text-align: left;
          vertical-align: Equitrim-Capital;
          width: 100%;
     }

     @media (min-width: 576px) {
          div.col-sm-12.mt-3 {
               flex: 0 0 100%;
               max-width: 100%;
          }
     }

     @media (min-width: 576px) and (max-width: 767px) {
          div.col-sm-12.mt-3:not(:last-of-type) {
               margin-bottom: 20px;
          }
     }

     @media (min-width: 320px) and (max-width: 575px) {
          div.col-sm-12.mt-3:not(:last-of-type) {
               margin-bottom: 20px;
          }
     }

     button#btnContactUs.btn.secondary-solid-btn {
          appearance: button;
          background-color: #e80566;
          border: 1px solid #e80566;
          border-radius: .25rem;
          box-sizing: border-box;
          color: #fff;
          cursor: pointer;
          display: inline-block;
          font-family: Montserrat, sans-serif;
          font-size: 13px;
          font-weight: 600;
          line-height: 1.5;
          margin: 0;
          overflow: visible;
          padding: 12px 30px;
          text-align: center;
          text-transform: none;
          transition: all .25s ease-in-out;
          user-select: none;
          vertical-align: middle;
     }

     button#btnContactUs.btn.secondary-solid-btn:focus {
          box-shadow: rgba(0, 123, 255, .25) 0 0 0 .2rem;
          outline: 0;
     }

     button#btnContactUs.btn.secondary-solid-btn:hover {
          background-color: transparent;
          box-shadow: none;
          color: #e80566;
          text-decoration: none;
     }

     button#btnContactUs.btn.secondary-solid-btn:disabled {
          opacity: .65;
     }
</style>
<?php
include "./footer.php";
?>