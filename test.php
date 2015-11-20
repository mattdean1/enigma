<html>
<head>
    <title>List</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <style>
        select, input[type="text"] {
           width: 160px;
           box-sizing: border-box;
        }
        section {
           padding: 8px;
           background-color: #f0f0f0;
           overflow: auto;
        }
        section > div {
          float: left;
          padding: 4px;
        }
        section > div + div {
          width: 40px;
          text-align: center;
        }
        fieldset {
            padding:10px;margin-top:10px;
        }
    </style>
</head>
<body>

<section class="container">
    <div>
        <select id="leftValues" size="5" multiple>
             <option>1</option>
             <option>2</option>
             <option>3</option>
        </select>
        <!--div>
            <input type="text" id="txtLeft" />
        </div-->
    </div>
    <div>
        <input type="button" id="btnRight" value="&gt;&gt;" />
        <input type="button" id="btnLeft" value="&lt;&lt;" />
    </div>
    <div>
        <select id="rightValues" size="4" multiple>

        </select>
        <!--div>
            <input type="text" id="txtRight" />
        </div-->
    </div>
</section>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Descriptive Options</h4>
      </div>
      <div class="modal-body">
        <!-- Your content here -->
        <input type="checkbox" name="mean" checked> Mean
        <input type="checkbox" name="sum"> Sum
        <fieldset style="padding:10px;margin-top:10px;">
            <legend>Description</legend>
            <input type="checkbox" checked> Std. Deviation
            <input type="checkbox"> Minimum
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Continue</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Help</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script>

    $("#btnLeft").click(function () {
        var selectedItem = $("#rightValues option:selected");
        $("#leftValues").append(selectedItem);
    });

    $("#btnRight").click(function () {
        var selectedItem = $("#leftValues option:selected");
        $("#rightValues").append(selectedItem);
    });

    $("#rightValues").change(function () {
        //var selectedItem = $("#rightValues option:selected");
        //$("#txtRight").val(selectedItem.text());
    });
    $("#leftValues").change(function () {
        //var selectedItem = $("#leftValues option:selected");
        //$("#txtLeft").val(selectedItem.text());
        $('#myModal').modal('show');

    });
</script>
</body>
</html>