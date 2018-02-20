
<!-- footer block !-->
<div class="footer">

    <div class="container">
        <div class="row-fuid social_box">
            <?php if (of_get_option('facebook') != "") { ?>      
                <a href="<?php echo of_get_option('facebook'); ?>" class="social" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                <?php
            }
            if (of_get_option('pinterest') != "") {
                ?>
                <a href="<?php echo of_get_option('pinterest'); ?>" class="social" target="_blank"><i class="fa fa-pinterest fa-lg"></i></a>
                <?php
            }
            if (of_get_option('twitter') != "") {
                ?>
                <a href="<?php echo of_get_option('twitter'); ?>" class="social" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                <?php
            }
            if (of_get_option('instagram') != "") {
                ?>
                <a href="<?php echo of_get_option('instagram'); ?>" class="social" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
                <?php
            }
            ?>
        </div>
        <div class="row-fluid footerblock">
            <?php echo of_get_option('copyright'); ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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