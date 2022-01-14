<?php echo $this->extend('eng/templates/layout'); ?>

<?php echo $this->section('content'); ?>
    <div id="container">
        <div class="contents reservation confirm">
            <div class="tit_wrap">
                <h2 data-aos="fade-up">Reservation</h2>
                <p data-aos="fade-up" data-aos-delay="400">
                    Welcome to FITTRIX.<br>
                    Make a reservation and <br class="pc_only"><span>experience FITTRIX’s service.</span>
                </p>
            </div>
			<form id="resv" name="resv" method="post">
			<div class="check_box">
                <div>
                    <div>
                        <span class="title">Name</span>
                        <input type="text" name="f_user_name" required>
                    </div>
                    <div>
                        <span class="title">Phone Number</span>
                        <input type="text" name="f_user_cell" required>
                    </div>
                    <div>
                        <span class="title">Favorite Exercise?</span>
                        <input type="text" name="f_answer" required>
                    </div>
                    <div class="submit">
						<button type="submit" class="btn_submit">SEARCH</button>
                    </div>
                </div>
            </div>
			</form>
		</div>
    </div>
<?php echo $this->endSection(); ?>