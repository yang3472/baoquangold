<?php if (!defined('THINK_PATH')) exit();?><div class="control-group" id="title-control-group">
    <label class="control-label"><?=_('关于图片(*)')?></label>
    <div class="controls">
        <div><input id="about_file_upload" name="about_file_upload" type="file" />
            <input type="button" value="确定上传" onclick="javascript:$('#about_file_upload').uploadify('upload','*');">&nbsp;&nbsp;
            ||&nbsp;&nbsp;<a href="javascript:ClearUpload('about');"></a></div>

        <span id="about_FileNames"></span>
        <input type="hidden" name="about_images" id="about_images"/>
        <input type="hidden" name="temp_about_images" id="temp_about_images"/></div></div></div>
<script src="/Public/uploadify/jquery.uploadify.min.js" type="text/javascript" ></script>
<link href="/Public/uploadify/uploadify.css" rel="stylesheet" type="text/css" />

<script>

    $("#about_file_upload").uploadify({
        'swf': '/theme/<?=T_D?>/assets/uploadify/uploadify.swf',//所需要的flash文件
        'cancelImg': 'cancel.png',//单个取消上传的图片
        'auto'    : false,
        'uploader': '/management/common/uploadify',//实现上传的程序
        'folder': 'uploads/pic',//服务端的上传目录
        'multi': true,//是否多文件上传的
        'displayData': 'speed',//进度条的显示方式
        'fileTypeExts': '*.jpg;*.jpeg;*.gif;*.png',//可上传的文件类型
        'fileSizeLimit': '2MB',//限制文件大小
        'simUploadLimit' :3, //并发上传数据
        'queueSizeLimit' :<?php echo count($lang);?>, //可上传的文件个数
    'buttonText' :'<?=_('文件上传')?>',//通过文字替换钮扣上的文字
            'buttonImg': 'css/images/browseBtn.png',//替换上传钮扣
            'width': 80,//buttonImg的大小
            'height': 24,//
            'formData':{'source':'doctor'},
    onSWFReady:function(){
        $("#doctors_FileNames").html('');
        $("#temp_doctor_images").val('');
    },
    onUploadSuccess: function (file, data, response) {
        var msg=$("#about_FileNames").html();
        var image_data=$("#temp_about_images").val();
        msg+=data+","+"<br/>";
        image_data+=data+",";
        $("#about_FileNames").html(msg);
        $("#temp_about_images").val(image_data);
    },
    onQueueComplete:function()
    {
        var msg=$("#about_FileNames").html();
        var image_data=$("#temp_about_images").val();
        $("#about_images").val(image_data);
    }
    });
    });
    //清除上传
    function ClearUpload(source)
    {
        if(source=='doctor')
        {
            $('#doctor_file_upload').uploadify('cancel','*');
            $("#doctors_FileNames").html('');
            $("#doctor_images").val('');
            $("#temp_doctor_images").val('');
        }
        else if(source=='about')
        {
            $('#about_file_upload').uploadify('cancel','*');
            $("#about_FileNames").html('');
            $("#about_images").val('');
            $("#temp_about_images").val('');
        }
    }
</script>