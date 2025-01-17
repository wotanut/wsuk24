<script>
	// Load the json file
	import results from '$lib/results.json';

	let pagination = [];
	let selectedPage = [];
	let page = 0;
	let variable = 1; // temporary variable for ranking
	let countries = [];
	let temp = []; // temporary array for storing variables before they're added to the pagination array
	// let increaseButton = Document.getElementById("next")
	// let decreaseButton = Document.getElementById("prev")

	// calculate the total number of medals a country has achieved

	function generateData() {
		results.forEach((country) => {
			let c = []; // Country variable to spread over the countryies array
			let totalMedals = 0;
			totalMedals =
				country.awards.silver +
				country.awards.gold +
				country.awards.bronze +
				country.awards.medallionForExcellence;
			c.push(country);
			c.push(totalMedals);
			countries.push(c);
		});

		sort(countries);
	}

	function sort(array) {
		// Sort the countries by total number of medals (desc)

		// a, The first element for comparison. Will never be undefined.
		// b, The second element for comparison. Will never be undefined.

		// It should return a number where:

		// A negative value indicates that a should come before b.
		// A positive value indicates that a should come after b.
		// Zero or NaN indicates that a and b are considered equal.

		array.sort((a, b) => {
			if (b[1] - a[1] == 0) {
				// They're both equal, so you'll need to compare gold medals
				if (b[0].awards.gold - a[0].awards.gold == 0) {
					// They're both equal, so you'll need to copmare silver
				} else {
					return b[0].awards.gold - a[0].awards.gold;
				}
			} else {
				return b[1] - a[1];
			}

			// Compare Silvers
			if (b[0].awards.silver - a[0].awards.silver == 0) {
				// They're both equal, so you'll need to copmare bronzes
			} else {
				return b[0].awards.silver - a[0].awards.silver;
			}

			// Compare Bronzes
			if (b[0].awards.bronze - a[0].awards.bronze == 0) {
				// They're both equal, so you'll need to copmare mfe
			} else {
				return b[0].awards.bronze - a[0].awards.bronze;
			}

			// Compare Bronzes
			if (b[0].awards.medallionForExcellence - a[0].awards.medallionForExcellence == 0) {
				// They're both equal ;-;
			} else {
				return b[0].awards.medallionForExcellence - a[0].awards.medallionForExcellence;
			}

			// Because they drew it will return in alphabetical order
			return 0;
		});

		// Give them a rank as opposed to an ID
		array.forEach((country) => {
			country.push(variable);
			variable = variable + 1;
		});

		// Turn them into paginations
		array.forEach((country) => {
			if (temp.length != 10) {
				temp.push(country);
			} else {
				pagination.push(temp);
				temp = [];
			}
		});
	}

	generateData();

	// Function to increase and decrease the page
	function incrementPage() {
		if (page == pagination.length) {
		} else {
			page = page + 1;
		}
	}

	function decreasePage() {
		// Check if page is equal to 0
		if (page == 0) {
		} else {
			page = page - 1;
		}
	}

	// Required for reactivity for the page
	$: selectedPage = pagination[page];

	// Function required for searching
	function filterBySearch(search) {
		let filtered = [];
		countries.forEach((country) => {
			if (
				country[0].member.name.includes(search) &&
				filtered.includes(country[0].member.name.includes(search)) == false
			) {
				filtered.push(country);
			} else {
			}
		});
		return filtered;
	}

	// Function for searching
	let search = '';
	function updateSearch() {
		// Regenerate Data in case the user deletes a character
		pagination = [];
		variable = 1;
		generateData();
		let filtered = [];
		filtered = filterBySearch(search);
		console.log(filtered);
		sort(filtered);
	}
</script>

<div class="input-container">
	<input
		class="search"
		type="text"
		name="search"
		id="Search"
		placeholder="Search the database"
		bind:value={search}
		on:input={updateSearch}
	/>
</div>

<table>
	<tbody>
		<tr>
			<th>Rank</th>
			<th>Member</th>
			<th>Gold</th>
			<th>Silver</th>
			<th>Bronze</th>
			<th>MfE</th>
			<th>Total</th>
		</tr>
		{#each selectedPage as country}
			<tr>
				<td>
					{country[2]}
				</td>
				<td>
					{country[0].member.name}
				</td>
				<td>
					{country[0].awards.gold}
				</td>
				<td>
					{country[0].awards.silver}
				</td>
				<td>
					{country[0].awards.bronze}
				</td>
				<td>
					{country[0].awards.medallionForExcellence}
				</td>
				<td>
					{country[1]}
				</td>
			</tr>
		{/each}
	</tbody>
</table>

<div class="pagination">
	<!-- Pagination -->
     
    {#if page == 0}
        
    {:else}
    	<button id="prev" on:click={decreasePage}> Previous </button>
    {/if}

	<!-- <input type="number" name="page" id="page" {page} bind:value={page}> / {pagination.length} -->
	{page} / {pagination.length}

    {#if page == pagination.length}
        
    {:else}
        <button id="next" on:click={incrementPage}> Next </button>
    {/if}
</div>

<style>
	table {
		display: grid;
		align-items: center;
		justify-content: center;
		text-align: center;
	}

	td,
	th {
		padding: 5px;
		padding-left: 10px;
	}

	th {
		border-bottom: solid 1px black;
	}

	.pagination {
		text-align: center;
	}

	.input-container {
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 5px;
	}

	.search {
		border: solid 1px black;
	}
</style>
