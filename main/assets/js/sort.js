document.querySelectorAll(".dropdown-item").forEach((item) => {
	item.addEventListener("click", function (e) {
		e.preventDefault();

		let selectedValue = this.getAttribute("data-value");

		// mendapatkan semua produk
		let produk = [];
		document.querySelectorAll("[name='produk']").forEach((prdk) => {
			produk.push(prdk);
		});

		// sortir bedasarkan nama
		if (selectedValue == "a-z" || selectedValue == "z-a") {
			produk.sort((a, b) => {
				let textA = a.querySelector("[name='nama-produk']").textContent.trim();
				let textB = b.querySelector("[name='nama-produk']").textContent.trim();
				return selectedValue == "a-z" 
					? textA.localeCompare(textB) 
					: textB.localeCompare(textA);
			});
			
			let produk_data = document.querySelector("[name='produk-data']");
			produk_data.append(...produk);
		}

		// sortir bedasarkan harga
		if (selectedValue == "mahal" || selectedValue == "murah") {
			produk.sort((a, b) => {
				let hargaA = parseInt(a.querySelector("[name='harga-produk']").textContent.trim().substring(3).replaceAll(".", ""));
				let hargaB = parseInt(b.querySelector("[name='harga-produk']").textContent.trim().substring(3).replaceAll(".", ""));
				// murah = harga terendah ke tertinggi, mahal = harga tertinggi ke terendah
				return selectedValue == "murah" 
					? hargaA - hargaB 
					: hargaB - hargaA;
			});
			
			let produk_data = document.querySelector("[name='produk-data']");
			produk_data.append(...produk);
		}
	});
});
