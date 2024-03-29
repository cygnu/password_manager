import React from 'react'
import { QueryClient, QueryClientProvider } from 'react-query'
import emotionReset from 'emotion-reset'
import { Global, css } from '@emotion/react'
import { AuthProvider } from './hooks/AuthContext'
import { Router } from './router'

const queryClient = new QueryClient({
  defaultOptions: {
    queries: {
      retry: false,
      refetchOnWindowFocus: false
    }
  }
})

export const App = () => {
  return (
    <AuthProvider>
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
    </AuthProvider>
  )
}
