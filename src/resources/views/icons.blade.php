<link href="/vendor/meta/css/bootstrap.min.css" rel="stylesheet">

<div class="modal fade" tabindex="-1" role="dialog" id="meta-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Meta Data Classification</h4>
            </div>
            <div class="modal-body">
                <?php
                    $previous_key = '';
                    $current_keys = '';
                    $label = '';
                    $labels = [];

                    function get_label($keys, $labels) {
                        $data = $labels;
                        $keys = explode('.', $keys);

                        $label = '';
                        $previous_key = '';
                        foreach ($keys as $key) {
                            $key = ($previous_key != '') ? $previous_key . '.' . $key : $key;
                            if (is_array($data) && array_key_exists($key, $data)) {
                                if($label == '') {
                                    $label = $data[$key];
                                } else {
                                    $label .= ' > ' . $data[$key];
                                }
                                $previous_key = $key;
                                continue;
                            }
                        }

                        return $label;
                    }
                ?>
                <div class="col-md-12">
                    @foreach($elements as $key => $element)

                        @if(!strpos($key, '.'))
                            @if($key != $previous_key)
                                <?php
                                    $label = $element['name'];
                                    $labels[$key] = $element['name'];
                                ?>
                            @endif
                        @endif

                        @if(strpos($key, '.') > 0)
                            <?php
                                $labels[$key] = $element['name'];
                            ?>
                        @endif

                        @if(!is_array($key))
                        <?php
                            echo get_label($key, $labels) . '<br />';
                        ?>
                        @endif

                        

                    @endforeach
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

<script>
    $('#meta-modal').modal('show');
</script>