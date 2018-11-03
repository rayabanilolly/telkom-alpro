<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-white bg-info">
						<div class="card-header"><b><i>Instruksi</i></b></div>
						<div class="card-body">
							<li>
	                        	Isi form data projek dengan cermat, karena data projek tidak dapat diubah.
	                        </li>
	                        <li>
	                        	Isi form data projek sesuai urutan, mulai dari regional, witel, sto, dst. Guna meminimalisir kerancuan data.
	                        </li>
	                        <li>
	                        	Ketika projek memerlukan sebuah ODC baru, maka pilih "ODC Baru", kemudian isi nama ODC baru dan spesifikasi dari ODC baru tersebut dengan cermat, dan tekan tombol "Simpan". Kemudian pilih lagi ODC dengan data ODC yang baru ditambahkan tadi. 
	                        </li>
	                        <li>
	                        	Ketika projek memerlukan sebuah distribusi baru, maka pilih "Distribusi Baru", kemudian isi nama distribusi baru dan kapasitas dari distribusi baru tersebut dengan cermat, dan tekan tombol "Simpan". Kemudian pilih lagi distribusi dengan data distribusi yang baru ditambahkan tadi.
	                        </li>
	                        <li>
	                        	Sistem juga memberikan informasi terkait core sisa dari suatu distribusi dan rekomendasi jumlah ODP yang tepat untuk pembangunan di distribusi tersebut.
	                        </li>
	                        <li>
	                        	Ketika semua data projek sudah dipastikan terisi, tekan tombol "Tampilkan Rekomendasi ODP", makan akan muncul daftar nama ODP yang direkomendasikan untuk projek tersebut di box kanan atas dengan judul "Daftar ODP Baru".
	                        </li>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="height: 25px !important"></div>
			<div class="row">
				<div class="col-md-8">
					<div class="card border-primary">
						<div class="card-header"><b><i>Form Data Projek</i></b></div>
						<div class="card-body">
							<form>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="regional">Regional</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="regional" name="regional" v-model="regional" v-on:change="allWitel()">
												<option :value="0">Pilih Regional</option>
												<option :value="regional.id" v-for="regional in regionals">{{ regional.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="witel">Witel</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="witel" name="witel" v-model="witel" v-on:change="allSto()">
												<option :value="0">Pilih Witel</option>
												<option :value="witel.id" v-for="witel in witels">{{ witel.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="sto">STO</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="sto" name="sto" v-model="sto" v-on:change="allOdc()">
												<option :value="0">Pilih STO</option>
												<option :value="sto.id" v-for="sto in stos">{{ sto.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="nama_projek">Nama Projek</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nama projek">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="mitra">Mitra Projek</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="mitra" name="mitra" v-model="mitra">
												<option :value="0">Pilih Mitra</option>
												<option :value="mitra.id" v-for="mitra in mitras">{{ mitra.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="tipe_projek">Tipe Projek</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="typeproj" name="typeproj">
												<option :value="0">Pilih Tipe</option>
												<option :value="type.id" v-for="type in types">{{ type.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="nomor_kontrak">Nomor Kontrak</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nomor kontrak">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="odc">ODC</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="odc" name="odc" v-model="odc">
												<option :value="0">Pilih ODC</option>
												<option value="add">Tambah ODC Baru</option>
												<option :value="odc.id" v-for="odc in odcs">{{ odc.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group" v-if="odc === 'add'">
									<div class="row">
										<div class="col-md-3">
											<label for="odc_baru">Nama ODC Baru</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nama ODC Baru">
										</div>
									</div>
								</div>
								<div class="form-group" v-if="odc === 'add'">
									<div class="row">
										<div class="col-md-3">
											<label for="specofodc">Spesifikasi ODC</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="specofodc" name="specofodc">
												<option :value="0">Pilih Spesifikasi</option>
												<option :value="spec.id" v-for="spec in specofodc">{{ spec.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="tipe_projek">Distribusi</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="nomor_kontrak">Nama Distribusi Baru</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nomor kontrak">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="tipe_projek">Kapasitas Distribusi Baru</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="tipe_projek"> </label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> </label>
										</div>
										<div class="col-md-8">
											<i><b>Kapasitas : kabel {num} <br> Core sisa : {num} core <br> Rekomendasi jumlah odp : {num} ODP</b></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="tipe_projek">Jumlah ODP</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md" style="text-align: right;">
											<button type="button" class="btn btn-primary btn-sm">Tampilkan Rekomendasi ODP &nbsp<i class="fas fa-arrow-right"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card border-danger">
						<div class="card-header"><b><i>Daftar ODP Baru</i></b></div>
						<div class="card-body">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import axios from 'axios';
	export default{
		data() {
			return {
				mitras: [],
				mitra: '',
				types: [],
				regionals: [],
				regional: '',
				witels: [],
				witel: '',
				stos: [],
				sto: '',
				odcs: [],
				odc: '',
				specofodc: [],
				distributions: [],
				capacityofdistribustion: []
			}
		},
		methods: {
			allRegional() {
				axios.get('/bookingcontentregional')
				.then(
					response => {
						this.regionals = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allWitel() {
				axios.get('/bookingcontentwitel/'+ this.regional)
				.then(
					response => {
						this.witels = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allSto() {
				axios.get('/bookingcontentsto/'+ this.witel)
				.then(
					response => {
						this.stos = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allMitra() {
				axios.get('/bookingcontentmitra')
				.then(
					response => {
						this.mitras = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allTypes() {
				axios.get('/bookingcontenttypeproj')
				.then(
					response => {
						this.types = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allOdc() {
				axios.get('/bookingcontentodc/'+ this.sto)
				.then(
					response => {
						this.odcs = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allSpecOfOdc() {
				axios.get('/bookingcontentodcspec')
				.then(
					response => {
						this.specofodc = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			}
		},
		mounted() {
			console.log('Component mounted.');
			this.allRegional();
			this.allMitra();
			this.allTypes();
			this.allSpecOfOdc();
		}
	}
</script>