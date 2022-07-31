/** @jsxImportSource @emotion/react */
import React from 'react'
import { Link } from 'react-router-dom'
import { AppBar, Toolbar, Typography, Button } from '@mui/material'
import { css } from '@emotion/react'
import { useAuth } from '../hooks/AuthContext'
import { useUser } from '../queries/AuthQuery'

export const Header: React.FC = () => {
  const { isAuth } = useAuth()
  const { data: authUser } = useUser()

  return (
    <AppBar position="static" css={appBar}>
      <Toolbar>
        <Typography variant="h6">Password Manager</Typography>
        {isAuth ? (
          <Typography>{authUser?.email}</Typography>
        ) : (
          <Button variant="outlined" size="small" component={Link} to="/login" color="inherit">
            Login
          </Button>
        )}
      </Toolbar>
    </AppBar>
  )
}

const appBar = css`
  height: 64px;
`
