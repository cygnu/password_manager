import React, { useEffect } from 'react'
import { BrowserRouter, Routes, Route, RouteProps, Navigate } from 'react-router-dom'
import { Login } from './pages/auth/Login'
import { ContentsPage } from './pages/content'
import { useAuth } from './hooks/AuthContext'
import { useUser } from './queries/AuthQuery'

export const Router = () => {
  const { isAuth, setIsAuth } = useAuth()
  const { isLoading, data: authUser } = useUser()

  useEffect(() => {
    if (authUser) {
      setIsAuth(true)
    }
  }, [authUser])

  const GuardRoute = (props: RouteProps) => {
    if (!isAuth) return <Navigate to="/login" />
    return <Route {...props} />
  }

  const LoginRoute = (props: RouteProps) => {
    if (!isAuth) return <Navigate to="/" />
    return <Route {...props} />
  }

  if (isLoading) return <div className="loader"></div>

  return (
    <BrowserRouter>
      <Routes>
        <GuardRoute path="/">
          <ContentsPage />
        </GuardRoute>
        <LoginRoute path="/login">
          <Login />
        </LoginRoute>
      </Routes>
    </BrowserRouter>
  )
}
