<!--View Source-->
<div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewsource"
            aria-expanded="false" aria-controls="viewsource">
            View Unsecure Source
        </button>
    </div>
    <div class="collapse" id="viewsource">
        <div class="mt-3 text-wrap">
            <div class="card card-body">
                <h3>Unsecure <?php echo $vulnerability; ?> Source</h3>
                <code><?php
                        $source_code = file_get_contents('./source/low.php');
                        $source_code = str_replace(array('$html .='), array('echo'), $source_code);
                        $source_code = highlight_string($source_code, true);

                        echo $source_code;

                        ?></code>
            </div>
        </div>
    </div>
    <!--End of View Source-->

    <!--View Improve Source-->
    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewimprovesource"
            aria-expanded="false" aria-controls="viewimprovesource">
            View Improve Source
        </button>
    </div>
    <div class="collapse" id="viewimprovesource">
        <div class="mt-3 text-wrap">
            <div class="card card-body">
                <h3>Improve <?php echo $vulnerability; ?> Source</h3>
                <code><?php
                        $source_code = file_get_contents('./source/improve.php');
                        $source_code = str_replace(array('$html .='), array('echo'), $source_code);
                        $source_code = highlight_string($source_code, true);

                        echo $source_code;

                        ?></code>
            </div>
        </div>
    </div>
    <!--End of View Improve Source-->