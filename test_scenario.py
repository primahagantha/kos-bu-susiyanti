import re
from playwright.sync_api import Playwright, sync_playwright, expect

def run(playwright: Playwright) -> None:
    browser = playwright.chromium.launch(headless=False)
    context = browser.new_context()
    page = context.new_page()
    
    # Base URL - Change this if your local setup is different
    BASE_URL = "http://localhost/lawak"

    # --- 1. Login ---
    print("Logging in...")
    page.goto(f"{BASE_URL}/login.php")
    page.get_by_label("Nama Pengguna").fill("admin")
    page.get_by_label("Kata sandi").fill("admin")
    page.get_by_role("button", name="Masuk").click()
    
    # Expect to be on dashboard or see dashboard elements
    expect(page).to_have_url(re.compile(r".*/dashboard.php"))
    print("Login successful.")

    # Test Data
    kamar_data = [
        {"no": "TEST01", "lantai": "1", "fasilitas": "AC, WiFi", "harga": "1000000"},
        {"no": "TEST02", "lantai": "2", "fasilitas": "Kipas, WiFi", "harga": "800000"}
    ]
    
    pemilik_data = [
        {"no": "901", "nama": "Budi Test", "alamat": "Jl. Test 1", "hp": "081234567890"},
        {"no": "902", "nama": "Siti Test", "alamat": "Jl. Test 2", "hp": "081234567891"}
    ]
    
    penyewa_data = [
        {"no": "801", "nama": "Ali Test", "jk": "Laki-laki", "lantai": "1", "kamar": "TEST01", "hp": "08111111111"},
        {"no": "802", "nama": "Ani Test", "jk": "Perempuan", "lantai": "2", "kamar": "TEST02", "hp": "08222222222"}
    ]
    
    penjaga_data = [
        {"no": "701", "nama": "Jaga 1", "hp": "08333333333", "jk": "Laki-laki", "jadwal": "Pagi"},
        {"no": "702", "nama": "Jaga 2", "hp": "08444444444", "jk": "Perempuan", "jadwal": "Malam"}
    ]
    
    tagihan_data = [
        {"kamar": "TEST01", "jumlah": "1000000", "ket": "Lunas"},
        {"kamar": "TEST02", "jumlah": "800000", "ket": "Belum Lunas"}
    ]

    # --- 2. Add Data ---
    
    # Add Kamar
    print("Adding Kamar...")
    for k in kamar_data:
        page.goto(f"{BASE_URL}/index_kamar.php")
        page.get_by_label("No Kamar").fill(k["no"])
        page.get_by_label("Lantai").fill(k["lantai"])
        page.get_by_label("Fasilitas").fill(k["fasilitas"])
        page.get_by_label("Harga Sewa").fill(k["harga"])
        page.get_by_role("button", name="Tambah Data").click()
        # Handle SweetAlert
        page.get_by_role("button", name="OK").click()
        print(f"Added Kamar {k['no']}")

    # Add Pemilik
    print("Adding Pemilik...")
    for p in pemilik_data:
        page.goto(f"{BASE_URL}/index_pemilik.php")
        page.get_by_label("No", exact=True).fill(p["no"])
        page.get_by_label("Nama Pemilik").fill(p["nama"])
        page.get_by_label("Alamat").fill(p["alamat"])
        page.get_by_label("No HP").fill(p["hp"])
        page.get_by_role("button", name="Tambah Data").click()
        page.get_by_role("button", name="OK").click()
        print(f"Added Pemilik {p['nama']}")

    # Add Penyewa
    print("Adding Penyewa...")
    for p in penyewa_data:
        page.goto(f"{BASE_URL}/index_penyewa.php")
        page.get_by_label("No", exact=True).fill(p["no"])
        page.get_by_label("Nama Penyewa").fill(p["nama"])
        page.get_by_label("Jenis Kelamin").select_option(p["jk"])
        page.get_by_label("Lantai").fill(p["lantai"])
        page.get_by_label("No Kamar").fill(p["kamar"])
        page.get_by_label("No HP").fill(p["hp"])
        page.get_by_role("button", name="Tambah Data").click()
        page.get_by_role("button", name="OK").click()
        print(f"Added Penyewa {p['nama']}")

    # Add Penjaga
    print("Adding Penjaga...")
    for p in penjaga_data:
        page.goto(f"{BASE_URL}/index_penjaga.php")
        page.get_by_label("No", exact=True).fill(p["no"])
        page.get_by_label("Nama Penjaga").fill(p["nama"])
        page.get_by_label("No HP").fill(p["hp"])
        page.get_by_label("Jenis Kelamin").select_option(p["jk"])
        page.get_by_label("Jadwal Kerja").fill(p["jadwal"])
        page.get_by_role("button", name="Tambah Data").click()
        page.get_by_role("button", name="OK").click()
        print(f"Added Penjaga {p['nama']}")

    # Add Tagihan
    print("Adding Tagihan...")
    for t in tagihan_data:
        page.goto(f"{BASE_URL}/index_tagihan.php")
        page.get_by_label("No Kamar").fill(t["kamar"])
        page.get_by_label("Jumlah Tagihan").fill(t["jumlah"])
        page.get_by_label("Keterangan Pembayaran").fill(t["ket"])
        page.get_by_role("button", name="Tambah Data").click()
        page.get_by_role("button", name="OK").click()
        print(f"Added Tagihan for {t['kamar']}")

    # --- 3. Verify & Delete Data ---
    
    # Delete Tagihan
    print("Deleting Tagihan...")
    page.goto(f"{BASE_URL}/daftar_tagihan.php")
    for t in tagihan_data:
        # Search for the row with the kamar number
        # Note: This assumes the delete button is in the same row
        # We might need a more robust way to find the specific delete button if there are many items
        # But for this test, we can try to find by text
        
        # Using XPath to find the row containing the text and then the delete button
        # Or just click the delete button if we know the order, but that's risky.
        # Let's use the 'hapus_tagihan.php?no=' link pattern if possible, but we don't know the 'no' (auto-increment id).
        # We can search by No Kamar in the search box if implemented, or just look for the text.
        
        # Try search feature if available
        page.fill("input[name='keyword']", t["kamar"])
        page.click("button:text('Cari')")
        
        # Now click the first delete button found (should be the one)
        # The delete button triggers a SweetAlert confirmation
        page.locator(".tombol-hapus").first.click()
        page.get_by_role("button", name="Ya, hapus!").click()
        print(f"Deleted Tagihan for {t['kamar']}")
        
    # Delete Penjaga
    print("Deleting Penjaga...")
    page.goto(f"{BASE_URL}/daftar_penjaga.php")
    for p in penjaga_data:
        # Assuming we can find by name or ID
        # No search feature visible in the code snippet for penjaga, but let's check if we can find by text
        row = page.get_by_role("row", name=re.compile(p["nama"]))
        row.get_by_role("link", name="Hapus").click() # Or button
        # Wait, the code uses onclick="confirmDelete" on an <a> tag
        # It's an <a> tag with class tombol-hapus
        
        # If row finding is hard, we can just go to the delete URL if we knew the ID.
        # But we used manual ID 'no' for Penjaga!
        # So we can construct the selector based on the link href
        
        # The delete link is hapus_penjaga.php?no=...
        # We inserted with specific 'no'
        
        page.locator(f"a[href='#' ][onclick*=\"confirmDelete('{p['no']}')\"]").click()
        page.get_by_role("button", name="Ya, hapus!").click()
        print(f"Deleted Penjaga {p['nama']}")

    # Delete Penyewa
    print("Deleting Penyewa...")
    page.goto(f"{BASE_URL}/daftar_penyewa.php")
    for p in penyewa_data:
        # We inserted with specific 'no'
        page.locator(f"a[href='#' ][onclick*=\"confirmDelete('{p['no']}')\"]").click()
        page.get_by_role("button", name="Ya, hapus!").click()
        print(f"Deleted Penyewa {p['nama']}")

    # Delete Pemilik
    print("Deleting Pemilik...")
    page.goto(f"{BASE_URL}/daftar_pemilik.php")
    for p in pemilik_data:
        # We inserted with specific 'no'
        page.locator(f"a[href='#' ][onclick*=\"confirmDelete('{p['no']}')\"]").click()
        page.get_by_role("button", name="Ya, hapus!").click()
        print(f"Deleted Pemilik {p['nama']}")

    # Delete Kamar
    print("Deleting Kamar...")
    page.goto(f"{BASE_URL}/daftar_kamar.php")
    for k in kamar_data:
        # Kamar uses no_kamar as primary key
        # Delete link: hapus_kamar.php?no_kamar=...
        # It's a direct link, not a JS confirm? 
        # Checking daftar_kamar.php: <a href="hapus_kamar.php?no_kamar=..." class="tombol-hapus">Hapus</a>
        # It seems it doesn't use SweetAlert confirm? Let's check the code again.
        # Code: <a href="hapus_kamar.php?no_kamar=<?php echo $d['no_kamar']; ?>" class="tombol-hapus">Hapus</a>
        # No onclick. So it might delete immediately or go to a confirmation page.
        # Usually it deletes immediately if it's a GET request (bad practice but common in simple PHP apps).
        
        page.locator(f"a[href='hapus_kamar.php?no_kamar={k['no']}']").click()
        # If there's an alert after deletion:
        # The hapus_kamar.php likely redirects back.
        print(f"Deleted Kamar {k['no']}")

    print("All tests completed successfully!")
    context.close()
    browser.close()

with sync_playwright() as playwright:
    run(playwright)
