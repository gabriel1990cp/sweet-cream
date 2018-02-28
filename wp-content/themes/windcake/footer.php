
<!-- Modal -->
<div class="modal hide fade" id="modalReceita" tabindex="-1" role="dialog" aria-labelledby="modalReceitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Envie sua receita !</h5>
            </div>
            <div class="modal-body">
                        <?php echo do_shortcode( '[contact-form-7 id="260" title="Formulário de contato - home"]' ); ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


<!-- end footer block !-->

<?php echo of_get_option('customjs'); ?>      
<?php echo of_get_option('googleanalytics'); ?>
<?php wp_footer(); ?>
</body>
</html>