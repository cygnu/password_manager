import React from 'react'
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom'
import { ContentsPage } from './pages/content'

export const Router = () => {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/about" element={<About />} />
        <Route path="/users" element={<Users />} />
        <Route path="/" element={<ContentsPage />} />
      </Routes>
    </BrowserRouter>
  )
}

function About() {
  return <h2>About</h2>
}

function Users() {
  return <h2>Users</h2>
}
