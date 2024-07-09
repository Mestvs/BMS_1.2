<script type="text/javascript">
    function fileValidate() {
     var fileInput = document.getElementById('file11');
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
       reader.onload = function (e) {
        document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '"/>';
       };
       reader.readAsDataURL(fileInput.files[0]);
      }
     }
    }
   </script>
   <!-- Modal -->
   <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
     <h3 id="myModalLabel"><b
       style="font-style: normal;font-family: all;">{{__('link.Change_Profileadmin')}} </h3>
    </div>
    <div class="modal-body">
         
     <form action="{{route('change_profile',Auth::user()->id)}}" enctype="multipart/form-data" autocomplete="off" method="POST">
        @csrf
      <center>
       <div class="control-group">
        <div class="controls">
         <input name="image" class="input-file uniform_on" id="file11" type="file" required
          onchange="return fileValidate()">
        </div>
       </div>
      </center>
    </div>
    <div class="modal-footer">
     <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>
     {{__('link.Closeadmin')}}</button>
     <button class="btn btn-info" name="change"><i
       class="icon-save icon-large"></i>{{__('link.savaadmin')}}</button>
    </div>
    </form>
   </div>
   <!-- end  Modal -->