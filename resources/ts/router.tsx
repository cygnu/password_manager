import React from 'react'
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom'
import { ContentsPage } from './pages/content'

export const Router = () => {
    return (
        <BrowserRouter>
            <div>
                <nav>
                    <ul>
                        <li>
                            <Link to="/">ContentPage</Link>
                        </li>
                        <li>
                            <Link to="/about">About</Link>
                        </li>
                        <li>
                            <Link to="/users">Users</Link>
                        </li>
                    </ul>
                </nav>
                <Routes>
                    <Route path="/about" element={<About />} />
                    <Route path="/users" element={<Users />} />
                    <Route path="/" element={<ContentsPage />} />
                </Routes>
            </div>
        </BrowserRouter>
    )
}

function About() {
    return <h2>About</h2>;
}

function Users() {
    return <h2>Users</h2>;
}
