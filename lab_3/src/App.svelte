<script>
	let table = [];
	let create_status = '';
	let add_status = 'disables';
	let delete_status = 'disabled';

	const create = () => {
		table = [
		{ id: 1, text: 'дефолт текст' },
		{ id: 2, text: 'опять текст' }
		];
		create_status = 'disabled';
		add_status = '';
		delete_status = '';
	}

	const add_row = () => {
		table = table.concat({ id: table[table.length-1].id + 1, text: (table[table.length-1].id + 1)*4 });
	}

	const delete_row = () => {
		table = table.slice(0,-1);
		if (table.length == 0) {
			create_status = '';
			add_status = 'disabled';
			delete_status = 'disabled';
		}
	}

</script>

<main>
	<div class="wrapper">
	{#each table as item}
		<table>
			<tbody>
			<tr>
				<td class="min">{item.id}</td>
				<td>{item.text}</td>
			</tr>
			<tbody>
		</table>
	{:else}
		<p>Таблицы пока нет :(</p>
	{/each}
	<div class="row">
		<button disabled={create_status} on:click={create}>Создать таблицу</button>
		<button disabled={add_status} on:click={add_row}>Добавить строку</button>
		<button disabled={delete_status} on:click={delete_row}>Удалить строку</button>
	</div>
	</div>
</main>

<style>
	.wrapper {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		margin: 50px;
	}
	.row {
		margin: 50px;
	}
	table {
		width: 50%;
		margin-bottom: 4px;
		border: 1px solid #dddddd;
		border-collapse: collapse;
	}
	table th {
		font-weight: bold;
		padding: 5px;
		background: #efefef;
		border: 1px solid #dddddd;
	}
	table td {
		border: 1px solid #dddddd;
		padding: 5px;
		width: 100px;
	}
	.min {
		width: 5px;
	}
</style>