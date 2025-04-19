// This file handles the 3D model viewing functionality using three.js.

document.addEventListener('DOMContentLoaded', function() {
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer();
    
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    const controls = new THREE.OrbitControls(camera, renderer.domElement);
    
    let model;

    function loadModel(url) {
        const loader = new THREE.IFCLoader();
        loader.load(url, function(ifcModel) {
            model = ifcModel;
            scene.add(model);
            camera.position.z = 5;
            render();
        });
    }

    function render() {
        requestAnimationFrame(render);
        renderer.render(scene, camera);
    }

    // Load the model from a specified URL
    loadModel('path/to/your/model.ifc');

    // Handle window resize
    window.addEventListener('resize', function() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
});