<div class="modal_title">
	<a href="#" class="close-icon"><i class="icon-remove"></i></a>
	<a href="#" class="back-icon"><i class="icon-reply"></i></a>	
	Add a New Shortcode
</div>
<div class="shortcode_modalbox">
	<div class="home_block">
		<a class="blocks" href="#columnblock">
			<span class="icon-columns icon-large modal_icons"></span>
			<span class="modal_heading">Columns</span>
		</a>	
		<a class="blocks" href="#buttonblock">
			<span class="icon-cog icon-large modal_icons"></span>
			<span class="modal_heading">Button</span>
		</a>
		<a class="blocks" href="#dividerblock">
			<span class="icon-fire icon-large modal_icons"></span>
			<span class="modal_heading">Divider</span>
		</a>
		<a class="blocks blockpad" href="#headingblock">
			<span class="icon-italic icon-large modal_icons"></span>
			<span class="modal_heading">Headings(h1,...)</span>
		</a>		
		<a class="blocks blockpad" href="#titleblock">
			<span class="icon-asterisk icon-large modal_icons"></span>
			<span class="modal_heading">Title</span>
		</a>
		<a class="blocks blockpad" href="#alertblock">
			<span class="icon-info icon-large modal_icons"></span>
			<span class="modal_heading">Alert</span>
		</a>		
	</div>

	<div class="other_block" id="headingblock">
	
		<div class="teamsocial colblock">
			<label>Select Heading</label>
			<select id="headingtype">
				<option value="h1">h1</option>
				<option value="h2">h2</option>
				<option value="h3">h3</option>
				<option value="h4">h4</option>
				<option value="h5">h5</option>
				<option value="h6">h6</option>				
			</select>
		</div>	

		<div class="teamskill">
			<label>Heading text</label>
			<textarea id="headingtext"></textarea>
		</div>
		
	</div>	
	
	<div class="other_block" id="alertblock">
	
		<div class="teamsocial colblock">
			<label>Alert Type</label>
			<select id="alerttype">
				<option value="warning">Warning</option>
				<option value="error">Error</option>
				<option value="info">Information</option>
				<option value="success">Success</option>
			</select>
		</div>	

		<div class="teamskill">
			<label>Alert text</label>
			<textarea id="alerttext"></textarea>
		</div>
		
	</div>	
	
	<div class="other_block" id="buttonblock">

		<div class="teamsocial colblock">
			<label>Button Size</label>
			<select id="buttonsize">
				<option value="small">Small</option>
				<option value="medium">Medium</option>				
				<option value="large">Large</option>
			</select>
		</div>			
		
		<div class="teamskill">
			<label>Button text</label>
			<textarea id="buttontext"></textarea>
		</div>	
	
	</div>	
	
	<div class="other_block" id="dividerblock">
		<div class="teamsocial">
			<label>Size</label>
			<select name="divsize" id="divsize">
				<option value="regular">Regular</option>
				<option value="double">Double</option>
			</select>
		</div>

		
	</div>

	<div class="other_block" id="columnblock">
		<p><strong>Note : Columns will be of equal sizes. eg. If you select number of columns=3, then there will be 3 columns of equal sizes.</strong></p>

		<div class="teamsocial colblock">
			<label>Number of Columns</label>
			<select name="colsize" id="colsize">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="6">6</option>
				<option value="12">12</option>
				
			</select>
		</div>	
	</div>		

	<div class="other_block" id="titleblock">
		<div class="teamsocial">
			<label>Title</label>
			<input type="text" id="titleheading">
		</div>
	</div>

	
<div class="modal_footer">
	<div class="footertext">
		<a href="#" class="go">Cancel</a>
		or
		<input type="button" id="homeinsert" class="insert" value="Insert" disabled="disabled">		
		<input type="button" id="headingblock1" class="insert" value="Insert">				
		<input type="button" id="buttonblock1" class="insert" value="Insert">		
		<input type="button" id="alertblock1" class="insert" value="Insert">
		<input type="button" id="dividerblock1" class="insert" value="Insert">
		<input type="button" id="columnblock1" class="insert" value="Insert">
		<input type="button" id="titleblock1" class="insert" value="Insert">
		<input type="button" id="skillsblock1" class="insert" value="Insert">
		<input type="button" id="galleryblock1" class="insert" value="Insert">
		
	</div>
</div>			
	</div>		

</div>
