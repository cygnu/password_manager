import React from 'react'
import { QueryClient, QueryClientProvider } from 'react-query'
import emotionReset from 'emotion-reset'
import { Global, css } from '@emotion/react'
import { Router } from './router'

const queryClient = new QueryClient()

export const App = () => {
  return (
    <QueryClientProvider client={queryClient}>
      <Global
        styles={css`
          ${emotionReset}
          li {
            list-style: none;
          }
        `}
      />
      <Router />
    </QueryClientProvider>
  )
}
