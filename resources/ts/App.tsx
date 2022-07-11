import React from 'react'
import emotionReset from 'emotion-reset'
import { Global, css } from '@emotion/react'
import { Router } from './router'

export const App = () => {
  return (
    <React.Fragment>
      <Global
        styles={css`
          ${emotionReset}
          li {
            list-style: none;
          }
        `}
      />
      <Router />
    </React.Fragment>
  )
}
