<!DOCTYPE html>
<html> 
<head> 
    <meta charset="utf-8"/>
    <title>File upload Progressbar Meter</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
</head> 

<body>
    <div style="width: 500px; margin: 25px auto;">
        <form id="uploadForm" action="upload.php" method="post"> 
            <div class="form-group">
                <label>File Upload</label>
                <input type="file" name="uploadFile" id="uploadFile" />
            </div>
            <div class="form-group">
                <input type="submit" id="uploadSubmit" value="Upload" class="btn btn-primary"/>
            </div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                </div>                
            </div>
            <div id="targetLayer"></div>
        </form>
        <div id="loader-icon" style="display: none;"><img src="LoaderIcon.gif"/></div>
    </div>

    
     
    <script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.form.min.js"></script> 
    <script>
        $(document).ready(function(){
            $('#uploadForm').submit(function(e){
                if($('#uploadFile').val()){
                  e.preventDefault();
                  $('#loader-icon').show()
                  $(this).ajaxSubmit({
                    target:"#targetLayer",
                    beforeSubmit:function(){
                        $('.progress-bar').width('0%')
                    },
                    uploadProgress:function(event, position, total, percentComplete){
                        $(".progress-bar").width(percentComplete+'%')
                        $(".progress-bar").html('<div id="progress-status">'+percentComplete' %</div>') 
                    },
                    success:function(){
                        $('#loader-icon').hide()
                    }
                    restForm:true
                  })  
                  return false
                }
            })
        })
    </script>
    
</body>
</html>
