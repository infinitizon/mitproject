<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <iframe id="frame" src="" width="100%" height="500" frameBorder="0"></iframe>
        </div>
    </div>
    </div>
</div>

<?php
        foreach($scripts as $script){
?>
<script src="<?php echo $script; ?>"></script>
<?php
    }
?>
<script>prettyPrint();</script>
</body>
</html>