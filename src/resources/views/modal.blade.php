<link href="/vendor/meta/css/bootstrap.min.css" rel="stylesheet">
<link href="/vendor/meta/css/select2.min.css" rel="stylesheet">

<div class="modal fade" tabindex="-1" role="dialog" id="meta-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form id="meta-form" class="form-horizontal" method="POST">

                        <div class="form-group">
                            <select class="select2 form-control" name="classification" id="classification">
                                @foreach($classifications as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="fields"></div>

                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="/vendor/meta/js/jquery.min.js"></script>
<script src="/vendor/meta/js/bootstrap.min.js"></script>
<script src="/vendor/meta/js/select2.min.js"></script>

<script>

    var data = '{{ $data }}';
    data = JSON.parse((data).replace(/&quot;/g, '"'));
    console.log('data', data);

    var current = {};
    var current_obj = {};
    var main_classification = -1;
    var has_value = false;

    $('#meta-modal').modal('show');

    $('.select2').select2({
        placeholder: "Select a classification",
        allowClear: true
    });

    $('#classification').on('change', function() {
        var classification = $(this).val();
        main_classification = classification;

        if(!current.hasOwnProperty(classification)) {
            current[classification] = [];
        }

        if(data.hasOwnProperty(classification)) {
            var html = create_dropdown(data[classification], -1);
            current_obj = data[classification];
            clear_fields();
            add_field(html);
        }
    });

    $(document).on('change', '.dropdown', function() {
        if(current.hasOwnProperty(main_classification)) {
            console.log('$(this).val()', $(this).val());
            var val = $(this).val();
            for(var id in current_obj) {
                var item = current_obj[id];
                if(item && item.hasOwnProperty('id') && item.id == val) {
                    console.log('item this', item);
                    if (item.hasOwnProperty('children') && Object.keys(item.children).length > 0) {

                        current_obj = item.children;
                        var html = create_dropdown(item.children, item.id);
                        add_field(html);
                        return;
                    } else {

                        var html = create_value_box(item.id);
                        add_field(html);
                        return;
                    }
                } else {
                    console.log('itemmabcs', item);
                }

            }
        }
    });

    function clear_fields() {
        $('#fields').empty();
    }

    function add_field(html) {
        $('#fields').append(html);
        $('.select2').select2({
            allowClear: true
        });
    }
    
    function create_value_box(id) {
        var html = '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="Value" data-parentid="' + id + '"/>';

        html += '</div>';

        return html;
    }
    
    function create_dropdown(temp_data, id) {

        var html = '<div class="form-group">' +
            '<select class="select2 form-control dropdown" data-itemid="' + id + '">';

        for(var item in temp_data) {
            item = temp_data[item];
            html += '<option value="' + item.id + '">' + item.name + '</option>';
        }

        html += '</select>' +
            '</div>';

        return html;
    }

</script>