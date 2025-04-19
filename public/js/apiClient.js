// apiClient.js
const API_URL = 'https://your-supabase-url.supabase.co/rest/v1/';
const API_KEY = 'your-supabase-api-key';

async function fetchFromAPI(endpoint, method = 'GET', body = null) {
    const options = {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${API_KEY}`,
            'apikey': API_KEY
        }
    };

    if (body) {
        options.body = JSON.stringify(body);
    }

    const response = await fetch(`${API_URL}${endpoint}`, options);
    if (!response.ok) {
        throw new Error(`Error: ${response.statusText}`);
    }
    return response.json();
}

async function getUsers() {
    return fetchFromAPI('users');
}

async function createUser(userData) {
    return fetchFromAPI('users', 'POST', userData);
}

async function getProjects() {
    return fetchFromAPI('projects');
}

async function createProject(projectData) {
    return fetchFromAPI('projects', 'POST', projectData);
}

async function getClashes() {
    return fetchFromAPI('clashes');
}

async function createClash(clashData) {
    return fetchFromAPI('clashes', 'POST', clashData);
}

// Export functions for use in other modules
export { getUsers, createUser, getProjects, createProject, getClashes, createClash };