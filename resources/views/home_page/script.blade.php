<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script src="css/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="css/assets/scripts.js"></script>
<script>
 $(function () {
  // Easy pie charts
  $('.chart').easyPieChart({ animate: 1000 });
 });
</script>
<!-- data table -->
<script src="css/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="css/assets/DT_bootstrap.js"></script>
<!-- jgrowl -->
<script src="css/vendors/jGrowl/jquery.jgrowl.js"></script>
<script>
 $(function () {
  $('.tooltip').tooltip();
  $('.tooltip-left').tooltip({ placement: 'left' });
  $('.tooltip-right').tooltip({ placement: 'right' });
  $('.tooltip-top').tooltip({ placement: 'top' });
  $('.tooltip-bottom').tooltip({ placement: 'bottom' });
  $('.popover-left').popover({ placement: 'left', trigger: 'hover' });
  $('.popover-right').popover({ placement: 'right', trigger: 'hover' });
  $('.popover-top').popover({ placement: 'top', trigger: 'hover' });
  $('.popover-bottom').popover({ placement: 'bottom', trigger: 'hover' });
  $('.notification').click(function () {
   var $id = $(this).attr('id');
   switch ($id) {
    case 'notification-sticky':
     $.jGrowl("Stick this!", { sticky: true });
     break;
    case 'notification-header':
     $.jGrowl("A message with a header", { header: 'Important' });
     break;
    default:
     $.jGrowl("Hello Users!");
     break;
   }
  });
 });
</script>
<link href="css/vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="css/vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="css/vendors/chosen.min.css" rel="stylesheet" media="screen">
<!--  -->
<script src="css/vendors/jquery.uniform.min.js"></script>
<script src="css/vendors/chosen.jquery.min.js"></script>
<script src="css/vendors/bootstrap-datepicker.js"></script>
<!--  -->
<script src="css/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script src="css/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
<script src="css/vendors/ckeditor/ckeditor.js"></script>
<script src="css/vendors/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="css/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
 $(function () {
  // Ckeditor standard
  $('textarea#ckeditor_standard').ckeditor({
   width: '98%', height: '150px', toolbar: [
    { name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates'] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
    ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'],			// Defines toolbar group without name.
    { name: 'basicstyles', items: ['Bold', 'Italic'] }
   ]
  });
  $('textarea#ckeditor_full').ckeditor({ width: '98%', height: '150px' });
 });
</script>
<!-- <script type="text/javascript" src="admin/assets/modernizr.custom.86080.js"></script> -->
<script src="css/assets/jquery.hoverdir.js"></script>
<link rel="stylesheet" type="text/css" href="css/assets//style.css" />
<script type="text/javascript">
 $(function () {
  $('#da-thumbs > li').hoverdir();
 });
</script>
<script src="css/vendors/fullcalendar/fullcalendar.js"></script>
<script src="css/vendors/fullcalendar/gcal.js"></script>
<link href="css/vendors/datepicker.css" rel="stylesheet" media="screen">
<script src="css/vendors/bootstrap-datepicker.js"></script>
<script>
 $(function () {
  $(".datepicker").datepicker();
  $(".uniform_on").uniform();
  $(".chzn-select").chosen();
  $('#rootwizard .finish').click(function () {
   alert('Finished!, Starting over!');
   $('#rootwizard').find("a[href*='tab1']").trigger('click');
  });
 });
 
 //query to show and disable the detail info
    function close_me(){
                  document.getElementById('login').style.display = "none";
                  }
    function openLoginForm(){
                      document.getElementById("login").style.display="block";
                  }
     function printVoucher(el) {
   var voucher = document.getElementById(el).innerHTML;
   document.body.innerHTML = voucher;
   window.print();
  }
</script>
<script type="text/javascript">
  //change to s
  function fileValidations() {
      var fileInput = document.getElementById('file');
      var filePath = fileInput.value;
      var allowedExtensions = /(\.docx|\.pdf|\.pptx|\.zip|\.txt|\.doc|\.rar)$/i;
      if (!allowedExtensions.exec(filePath)) {
          alert('Please upload file having extensions .docx/.pdf/.pptx/.zip/.txt/.doc only.');
          fileInput.value = '';
          return false;
      } else {
          //Image preview
          if (fileInput.files && fileInput.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '"/>';
              };
              reader.readAsDataURL(fileInput.files[0]);
          }
      }
  }
        function fileValidation() {
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    
//script for password strength 
    $(function() {
        $("#new_password").bind("keyup", function() {
            //TextBox left blank.
            if ($(this).val().length == 0) {
                $("#password_strength").html("");
                return;
            }
            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.

            var passed = 0;

            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test($(this).val())) {
                    passed++;
                }
            }
            //Validate for length of Password.
            if (passed > 2 && $(this).val().length > 8) {
                passed++;
            }
            //Display status.
            var color = "";
            var strength = "";
            switch (passed) {
                case 0:
                case 1:
                    strength = "Weak";
                    color = "red";
                    break;
                case 2:
                    strength = "Good";
                    color = "darkorange";
                    break;
                case 3:
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
                case 5:
                    strength = "Very Strong";
                    color = "darkgreen";
                    break;
            }
            $("#password_strength").html(strength);
            $("#password_strength").css("color", color);
        });
    });
</script>