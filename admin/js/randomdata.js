function getMatrixedLeaves() {
	var items = [];
	
	items.push(new primitives.orgdiagram.ItemConfig({
		id: 1,
		parent: null,
		title: "ffff",
		description: "Description of " + "reza moosavi",
	}));

		var manager = new primitives.orgdiagram.ItemConfig({
			id: 2,
			parent: 1,
			title: "dfgdfg",
		});
		items.push(manager);

		var manager = new primitives.orgdiagram.ItemConfig({
			id: 3,
			parent: 1,
			title: "dfgdfg",
		});
		items.push(manager);

	return items;
}