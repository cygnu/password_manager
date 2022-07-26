/** @jsxImportSource @emotion/react */
import React from 'react'
import { Link } from 'react-router-dom'
import { AppBar, Toolbar, Typography, Button } from '@mui/material'
import { css } from '@emotion/react'

export const Header: React.FC = () => {
  return (
    <AppBar position="static" css={appBar}>
      <Toolbar>
        <Typography variant="h6">Password Manager</Typography>
        <Button variant="outlined" size="small" component={Link} to="/login" color="inherit">
          Login
        </Button>
      </Toolbar>
    </AppBar>
  )
}

const appBar = css`
  height: 64px;
`
