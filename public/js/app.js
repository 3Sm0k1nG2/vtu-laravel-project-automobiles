// FEATURES TO RUN WHEN DOCUMENT EVENT IS CALLED

let features = [
    navClickToUpdate,
    visibleHeader,
    // navScrollToUpdate
]

// DOCUMENT (ROOT) ELEMENT

document.addEventListener('readystatechange', (event) => {
    setup();

    features.forEach(x => x());
});

// FEATURES DEPENDANCY VARIABLES/CONSTS

const activeClass = 'active';
let lastLink = undefined;

// SETUP FEATURES' VARIABLES (do not remove)

function setup(event) {
    lastLink = document.querySelector('header a.active') ?? undefined;
}

// FEATURES

function updateLink(linkElement) {
    if(lastLink === linkElement){
        return;
    }

    console.log('link: ' + linkElement);
    console.log('last: ' + lastLink);

    if (lastLink) {
        removeActive(lastLink);
    }

    addActive(linkElement);
    lastLink = linkElement;
}

function removeActive(linkElement) {
    linkElement.classList.remove(activeClass);
    linkElement.disabled = false;
    linkElement.draggable = true;
}

function addActive(linkElement) {
    linkElement.classList.add(activeClass);
    linkElement.disabled = true;
    linkElement.draggable = false;
}

function navClickToUpdate() {

    document.querySelector('header').addEventListener('click', eventHandler);

    function eventHandler(event) {
        if (event.target.localName !== 'a') {
            return;
        }

        if (event.target.disabled) {
            return;
        }

        updateLink(event.target);
    }
}

function navScrollToUpdate() {
    let header = document.getElementsByTagName('header')[0] ?? undefined;
    let links = document.querySelectorAll('header a');
    let anchors = document.querySelectorAll('section div[id]');

    if (!header || !links.length || !anchors.length) {
        throw 'No header, no links or no anchors found.';
    }

    window.addEventListener('scroll', eventHandler);

    let offsets = [];
    anchors.forEach(x => offsets.push(x.getBoundingClientRect().top + window.scrollY - 60));

    function eventHandler() {
        for (let i in offsets) {
            let offset = offsets[i];

            if (window.pageYOffset <= offset) {
                updateLink(links[i]);
                return;
            }
        }

        updateLink(links[links.length - 1]);
    }
}

function visibleHeader() {
    let header = document.getElementsByTagName('header')[0] ?? undefined;
    let lastPageYOffset = 0;

    if (!header) {
        throw 'No header found.';
    }

    window.addEventListener('scroll', eventHandler);

    function eventHandler(event) {
        if (window.pageYOffset > lastPageYOffset) {
            header.className = 'hidden';
            lastPageYOffset = window.pageYOffset;
            return;
        }
        header.className = 'show'
        lastPageYOffset = window.pageYOffset;
    }
}
