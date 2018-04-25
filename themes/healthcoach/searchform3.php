<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input type="text" class="form-control" name="s" placeholder="<?php esc_html_e('Search for Keywords', 'healthcoach')?> ">
    <button type="submit">
        <span class="icon fa fa-search"></span>
    </button>
</form>