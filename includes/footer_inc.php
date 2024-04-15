<footer class="footer">
		<div class="cont">
			<div class="row">
				<div class="footer-col">
					<h4>Contact Us</h4>
					<ul>
						<li><a href="#">Sto. Rosario Angeles Pampanga</a></li>
						<li><a href="#">+634789765245</a></li>
						<li><a href="#">medicaph@gmail.com</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="home.php" class="active">Home</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="about.php">About Us</a></li>
						<li><a href="contact.php">Contact Us</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>Stay Connected</h4>
					<div class="social-links">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
						<a href="#"><i class="fab fa-linkedin-in"></i></a>
					</div>
				</div>
			</div>
		</div>

	</footer>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const menuBtn = document.querySelector(".menu-btn");
			const menu = document.querySelector(".navbar .menu");

			menuBtn.addEventListener("click", function () {
				menu.classList.toggle("active");
				menuBtn.classList.toggle("active");
			});
		});
	</script>
