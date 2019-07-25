<!DOCTYPE html>
<html>
<head>
	<title>Custome Alert</title>
	<style type="text/css">
		body{
			font-family: 'Arial';
		}
		.dlg-container{
			position: absolute;
			left: 50%;
			top: -30%;
			transform: translateX(-50%) translateY(-50%);
			width: 400px;
			background: #fff;
			padding: 10px;
			border: 2px solid #ddd;
			box-shadow: 1px 1px 5px 1px #ccc;
			border-radius: 10px;
			opacity: 0;
			transition: all 0.3s linear 0s;
		}
		.dlg-header{
			padding: 10px;
			font-weight: bold;
			background: #575757;
			color: #f6f7f8;
		}
		.dlg-body{
			padding: 10px;
			line-height: 30px;
		}
		.dlg-footer{
			text-align: center;
			background: #f5f5f2;
			padding: 3px 0;
		}
		.dlg-footer a{
			display: inline-block;
			width: 100px;
			padding: 5px 0;
			border: 1px solid #ccc;
			border-radius: 10px;
			background: #eee;
			cursor: pointer;
		}
		.dlg-footer a:active{
			box-shadow: inset 2px 2px 4px 0 #ccc;
			color: #666;
		}
	</style>
</head>
<body>
	<button onclick="alert('This is our alert dialog. Press \'Ok\' to close this.');">Default Alert</button>
	<button onclick="CustomAlert.show('This is our custom alert dialog. Press \'Ok\' to close this.');">Custom Alert</button>
	<div id="dialogCont" class="dlg-container">
		<div class="dlg-header">Custom Alert Dialog</div>
		<div id="dialogBody" class="dlg-body"></div>
		<div class="dlg-footer">
			<a onclick="CustomAlert.close();">OK</a>
		</div>
	</div>
	<script type="text/javascript">
		var CustomAlert = new function(){

			this.show = function(msg){
				var dlg = document.getElementById('dialogCont');
				var dlgBody = dlg.querySelector('#dialogBody');
				dlg.style.top = '30%';
				dlg.style.opacity = 1;
				dlgBody.textContent = msg;
			}

			this.close = function(){
				var dlg = document.getElementById('dialogCont');
				var dlgBody = dlg.querySelector('#dialogBody');
				dlg.style.top = '-30%';
				dlg.style.opacity = 0;return;
			}
		}
	</script>
</body>
</html>