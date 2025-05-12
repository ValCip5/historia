const classNames = {
    BLOCK: "block",
    BLOCK_IMAGE: "block-image",
    BLOCK_IMAGE_CONTAINER: "block-image-container",
    BLOCK_ACTIONS: "block-actions",
    IMAGE_INPUT: "image-input",
    TEXT_INPUT: "text-input",
    REMOVE_BUTTON: "remove-button"
}

transformJsBlocks();
addNewBlock();
reassignBlockIds();

//------------------------

function getBlocks() {
    return document.getElementsByClassName(classNames.BLOCK);
}

function addNewBlock(text, id) {
    const container = document.getElementById("noticia-container")
    container.insertBefore(createBlock(text), container.children[id + 1]);
    checkRemoveButtons();
}

function createAddBlockButton(id){
    const button = document.createElement("input");
    button.value = "Agregar bloque";

    button.type = "button";

    button.onclick = () => addNewBlock('', id);

    return button;
}

function createBlock(text) {
    const id = getNewBlockId();

    const container = document.createElement("div");

    container.id = "block_" + id;
    container.classList += classNames.BLOCK;

    container.appendChild(createBlockTextInput(id, text));
    container.appendChild(createBlockImageContainer(id));

    return container;
}

function createBlockTextInput(id, text) {
    const input = document.createElement("textarea");
    const name = "text_" + id;

    if (text) {
        console.log(text);
        input.innerHTML = text;
    }

    input.id = name;
    input.name = name;
    input.setAttribute("required", '');
    input.classList += classNames.TEXT_INPUT;
    input.placeholder = "Escriba aquí...";
    input.oninput = checkText(input);

    return input;
}

function createBlockImageContainer(id) {
    const container = document.createElement("div");

    container.classList += classNames.BLOCK_IMAGE_CONTAINER;

    // Aca habria que prependear la imagen
    container.appendChild(createBlockActions(id));

    return container;
}

function createBlockActions(id) {
    const actions = document.createElement("div");

    actions.classList += classNames.BLOCK_ACTIONS;

    actions.appendChild(createImageInput(id));

    actions.appendChild(createAddBlockButton(id));

    return actions;
}

function createImageInput(id) {
    const input = document.createElement("input");    

    setNameAndId(input, "image_" + id);
    input.classList += classNames.IMAGE_INPUT;
    input.type = "file"
    input.accept = "image/*";

    return input;
}

function createRemoveButton(block) {
    const button = document.createElement("input");

    button.type = "button";
    button.classList += classNames.REMOVE_BUTTON;
    button.value = "Quitar";
    button.onclick = () => removeBlock(block);

    return button;
}

function checkRemoveButtons() {
    const blocks = getBlocks();
    const removeButtons = document.getElementsByClassName(classNames.REMOVE_BUTTON);
    const originalLength = removeButtons.length;
    for (let i=0; i<originalLength; i++) {
        removeButtons[0].remove();
    }

    if (blocks.length > 1) {
        for (let i=0; i<blocks.length; i++) {
            const block = blocks[i];
            block.getElementsByClassName(classNames.BLOCK_ACTIONS)[0].appendChild(createRemoveButton(block));
        }
    }
}

function getNewBlockId() {
    const blocks = getBlocks();
    return blocks.length + 1;
}

function removeBlock(block) {
    block.remove();

    reassignBlockIds();
    checkRemoveButtons();
}

function reassignBlockIds() {
    const blocks = getBlocks();

    for (let i=0; i<blocks.length; i++) {
        const block = blocks[i];
        const number = i + 1;

        const text = block.getElementsByClassName(classNames.TEXT_INPUT)[0];
        const image = block.getElementsByClassName(classNames.BLOCK_ACTIONS)[0]
                            .getElementsByClassName(classNames.IMAGE_INPUT)[0];

        setNameAndId(block, "block_" + number);
        setNameAndId(text, "text_" + number);
        setNameAndId(image, "image_" + number);

    }
}

function setNameAndId(element, value) {
    element.id = value;
    element.name = value;
}

function checkText(element) {
    return () => {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight + 2) + "px";
    }
}

function transformJsBlocks() {
    const jsBlocks = document.getElementsByClassName('js-block');

    for (let i=0; i<jsBlocks.length; i++) {
        const jsBlock = jsBlocks[i];
        console.log(jsBlock.value);


        addNewBlock(jsBlock.value);
    }
}